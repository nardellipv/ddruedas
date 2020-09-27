<?php

namespace App\Http\Controllers\User;

use App\Accessory;
use App\Brand;
use App\Category;
use App\Equipment;
use App\EquipmentItem;
use App\Http\Requests\ItemNewRequest;
use App\Item;
use App\ItemPayment;
use App\Pattern;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Picture;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;


class DashboardController extends Controller
{
    public function listVehicles()
    {
        $listMotos = Item::with(['brand', 'pattern', 'type','pictures'])
            ->where('user_id', Auth::user()->id)
            ->where('status', '!=', 'Pausado')
            ->where('status', '!=', 'Rechazado')
            ->where('expire', '>=', now())
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('web.user.listActive', compact('listMotos'));
    }

    public function listAccesories()
    {
        $listAccesories = Accessory::with(['category'])
            ->where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('web.user.listAccesoriesActive', compact('listAccesories'));
    }

    public function listVehiclesPaused()
    {
        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->where('status', 'Pausado')
            ->where('expire', '>=', now())
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('web.user.listPaused', compact('listMotos'));
    }

    public function listVehiclesExipire()
    {
        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->where('expire', '<=', now())
            ->orderBy('updated_at', 'DESC')
            ->get();


        return view('web.user.listExipre', compact('listMotos'));
    }

    public function listVehiclesRejected()
    {
        $listMotos = Item::with(['brand', 'pattern', 'type'])
            ->where('user_id', Auth::user()->id)
            ->where('status', 'Rechazado')
            ->orderBy('updated_at', 'DESC')
            ->get();


        return view('web.user.listExipre', compact('listMotos'));
    }

    public function publicMoto()
    {
        $brands = Brand::all();

        $equipments = Equipment::all();

        $payments = Payment::all();

        $types = Type::all();

        return view('web.dealer.publicNew', compact('brands', 'equipments', 'payments', 'types'));
    }

    public function publicAccessory()
    {
        $brands = Brand::all();

        $categories = Category::all();

        return view('web.dealer.publicNewAccessory', compact('brands', 'categories'));
    }


    public function selectPattern()
    {

        $patternsFilter = request()->input(['marca']);

        $brandName = Brand::where('id', $patternsFilter)
            ->first();

        $patterns = Pattern::where('brand_id', $patternsFilter)
            ->get();


        $equipments = Equipment::all();

        $brands = Brand::all();

        $payments = Payment::all();

        $types = Type::all();

        return view('web.dealer.publicNew', compact('brandName', 'patterns', 'equipments', 'patternsFilter',
            'payments', 'types', 'brands'));
    }

    public function publicNew(ItemNewRequest $request)
    {
        $userId = Auth::user();
//dd($userId);
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

        //creamos carpeta
        $path = 'users/' . $userId->id;

        makeFolder();


        $item = Item::create([
            'condition' => $request['condition'],
            'brand_id' => $request['brand'],
            'pattern_id' => $request['pattern'],
            'type_id' => $request['type'],
            'version' => $request['version'],
            'displacement' => $request['displacement'],
            'year' => $year,
            'mileage' => $mileage,
            'fuel' => $request['fuel'],
            'typeEngine' => $request['typeEngine'],
            'barter' => $barter,
            'price' => $request['price'],
            'money' => $request['money'],
            'expire' => \Carbon\Carbon::parse(now()->addDay(30)),
            'comment' => $request['comment'],
            'user_id' => $userId->id,
            'province_id' => $userId->province_id,
            'region_id' => $userId->region_id,
        ]);

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
                    EquipmentItem::create([
                        'equipment_id' => $value,
                        'item_id' => $item->id,
                    ])];
            }
        }

        if ($request->payment) {
            foreach ($request->payment as $key => $value) {
                $value = [
                    ItemPayment::create([
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


        notify()->success('Un administrador validará la publicación.', 'Publicación Correcta');
        return redirect()->route('dashboard.listVehicles', compact('listMotos'));
    }
}
