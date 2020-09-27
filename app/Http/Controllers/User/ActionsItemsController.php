<?php

namespace App\Http\Controllers\User;

use App\Brand;
use App\Equipment;
use App\EquipmentItem;
use App\Http\Requests\ItemUpdateRequest;
use App\Item;
use App\Http\Controllers\Controller;
use App\ItemPayment;
use App\Pattern;
use App\Picture;
use App\Province;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use App\Type;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;

class ActionsItemsController extends Controller
{
    public function paused($id)
    {
        $item = Item::find($id);
        $item->status = 'Pausado';
        $item->save();

        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->get();

        notify()->success('La publicación fue pausada con éxito.', 'Publicación Pausada');
        return redirect()->route('dashboard.listVehicles', compact('listMotos'));
    }

    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();

        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->get();

        notify()->success('La publicación fue eliminada con éxito.', 'Publicación Eliminada');
        return redirect()->route('dashboard.listVehicles', compact('listMotos'));
    }

    public function play($id)
    {
        $item = Item::find($id);
        $item->status = 'Activo';
        $item->save();

        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->get();

        notify()->success('La publicación fue activada con éxito.', 'Publicación Activada');
        return redirect()->route('dashboard.listVehicles', compact('listMotos'));
    }

    public function reActive($id)
    {
        $item = Item::find($id);
        $item->status = 'Activo';
        $item->expire = \Carbon\Carbon::parse(now()->addDay(30));
        $item->save();

        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->get();

        notify()->success('La publicación fue activada con éxito.', 'Publicación Activada');
        return redirect()->route('dashboard.listVehicles', compact('listMotos'));
    }

    public function download($id)
    {
        $item = Item::find($id);

        $data = [
            'picture' => $item->photo,
            'brand' => $item->brand->name,
            'pattern' => $item->pattern->name,
            'money' => $item->money,
            'price' => $item->price,
            'year' => $item->year,
            'mileage' => $item->mileage,
            'displacement' => $item->displacement,
            'type' => $item->type->name,
            'comment' => $item->comment,
            'condition' => $item->condition,
            'fuel' => $item->fuel,
            'alarm' => $item->alarm,
            'barter' => $item->barter,
        ];

        return \PDF::loadView('web.parts._pdfDownload', $data)
            ->download($item->brand->name . ' ' . $item->pattern->name . '.pdf');

    }

    public function show($id)
    {
        $item = Item::find($id);

        $brands = Brand::all();

        $equipmentItems = EquipmentItem::with(['equipment'])
            ->where('item_id', $item->id)
            ->get();

        $itemPayments = ItemPayment::with(['payment'])
            ->where('item_id', $item->id)
            ->get();


        $itemPictures = Picture::where('item_id', $item->id)
            ->get();

        $equipments = Equipment::all();

        $payments = Payment::all();

        $types = Type::all();

        $provinces = Province::all();

        return view('web.dealer.editMoto', compact('brands', 'equipments', 'payments', 'types', 'provinces', 'item',
            'equipmentItems', 'itemPayments', 'itemPictures'));
    }

    public function selectPattern()
    {
        $itemId = request()->input(['itemId']);
        $patternsFilter = request()->input(['marca']);
        $removeEquipment = request()->input(['remover-equipamiento']);
        $removePayment = request()->input(['remover-pagos']);
        $removeImage = request()->input(['remover-imagen']);

        $item = Item::find($itemId);

        $brandName = Brand::where('id', $patternsFilter)
            ->first();

        $patterns = Pattern::where('brand_id', $patternsFilter)
            ->get();

        /*borra equipamiento*/
        if (isset($removeEquipment)) {
            $removeEquipmentId = EquipmentItem::find($removeEquipment);
            $removeEquipmentId->delete();

            $equipmentItems = EquipmentItem::with(['equipment'])
                ->where('item_id', $itemId)
                ->get();
        } else {
            $equipmentItems = EquipmentItem::with(['equipment'])
                ->where('item_id', $itemId)
                ->get();
        }

        /*borra metodos de pago*/
        if (isset($removePayment)) {
            $itemCount = ItemPayment::count();

            if($itemCount == 1){
                notify()->error('Tiene que haber al menos una forma de pago.', 'Publicación No Actualizada');
                return back();
            }

            $removePaymentId = ItemPayment::find($removePayment);
            $removePaymentId->delete();

            $itemPayments = ItemPayment::with(['payment'])
                ->where('item_id', $itemId)
                ->get();
        } else {
            $itemPayments = ItemPayment::with(['payment'])
                ->where('item_id', $itemId)
                ->get();
        }

        /*borra imagen*/
        if (isset($removeImage)) {
            $removeImageId = Picture::find($removeImage);
            File::delete('users/' . $item->user_id . '/images/items/700x700-' . $removeImageId->name);
            $removeImageId->delete();

            $itemPictures = Picture::where('item_id', $item->id)
                ->get();
        } else {
            $itemPictures = Picture::where('item_id', $item->id)
                ->get();
        }

        $brands = Brand::all();

        $equipments = Equipment::all();

        $payments = Payment::all();

        $types = Type::all();

        $provinces = Province::all();

        return view('web.dealer.editMoto', compact('brands', 'equipments', 'payments', 'types',
            'provinces', 'item', 'brandName', 'patterns', 'equipmentItems', 'itemPayments', 'itemPictures'));
    }

    public function update(ItemUpdateRequest $request, $id)
    {
        $userId = Auth::user();

        if (!isset($request->year)) {
            $year = now()->year;
            $mileage = '0';
        } else {
            $year = $request['year'];
            $mileage = $request['mileage'];
        }

        //comprobamos que acepta permuta
        if(collect($request->payment)->contains('2') OR collect($request->payment)->contains('3')){
            $barter = 'Si';
        }else{
            $barter = 'No';
        }

        $item = Item::find($id);
        $item->condition = $request['condition'];
        $item->brand_id = $request['brand'];
        $item->pattern_id = $request['pattern'];
        $item->type_id = $request['type'];
        $item->version = $request['version'];
        $item->displacement = $request['displacement'];
        $item->year = $year;
        $item->mileage = $mileage;
        $item->fuel = $request['fuel'];
        $item->typeEngine = $request['typeEngine'];
        $item->price = $request['price'];
        $item->money = $request['money'];
        $item->barter = $barter;
        $item->status = 'Pendiente';
        $item->comment = $request['comment'];


        //creamos carpeta
        $path = 'users/' . $userId->id;

        makeFolder();


        if (count($request->files)) {
            $pictures = 0;
            foreach ($request->files as $value) {
                $pictures += count($value) - 1;
            }
            for ($i = 0; $i <= $pictures; $i++) {
                $image = $request->file('files');
                $input['photo700'] = '700x700-' . $userId->id . '-' . $image[$i]->getClientOriginalName();

                $img = Image::make($image[$i]->getRealPath());
                $img->fit(700, 700)->save($path . '/images/items/' . $input['photo700'], 50);

                $photoName = Str::after($input['photo700'], '-');

                Picture::create([
                    'name' => $photoName,
                    'item_id' => $item->id,
                ]);
            }
        }
        $item->save();

        if ($request->equipment) {
            foreach ($request->equipment as $key => $value) {
                $value = [
                    EquipmentItem::updateOrCreate([
                        'equipment_id' => $value,
                        'item_id' => $item->id,
                    ])];
            }
        }

        if ($request->payment) {
            foreach ($request->payment as $key => $value) {
                $value = [
                    ItemPayment::updateOrCreate([
                        'item_id' => $item->id,
                        'payment_id' => $value,
                    ])];
            }
        }


        Mail::send('emails.pendingItemToActivateToAdmin', ['userId' => $userId, 'item' => $item], function ($msn) use($userId, $item){
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Item pendiente de apobación');
            $msn->to('nardellipv@gmail.com', 'Pablo');
        });

        Mail::send('emails.pendingItemToActivateToUser', ['userId' => $userId, 'item' => $item], function ($msn) use($userId, $item){
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Item pendiente de apobación');
            $msn->to($userId->email, $userId->name);
        });



        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->get();


        notify()->success('Un administrador validará la publicación.', 'Publicación Actualizada');
        return redirect()->route('dashboard.listVehicles', compact('listMotos'));
    }
}
