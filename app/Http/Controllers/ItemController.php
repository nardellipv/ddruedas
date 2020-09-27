<?php

namespace App\Http\Controllers;

use App\EquipmentItem;
use App\Item;
use App\ItemPayment;
use App\Picture;
use App\Province;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ItemController extends Controller
{

    public function index()
    {
        $listItems = Item::with(['brand', 'pattern', 'user', 'type', 'pictures','user.dealer','user.province','user.region'])
            ->where('status', 'Activo')
            ->where('expire', '>=', now())
            ->orderBy('items.year', 'DESC')
            ->paginate(10);

        $countItems = Item::count();

        $provinces = Province::all();

        $types = Type::all();

        $maxPrice = Item::max('price');

        $minYear = Item::min('year');

        return view('web.items.list', compact('listItems', 'countItems', 'provinces', 'types',
            'maxPrice', 'minYear'));
    }

    public function filter()
    {

        $filter = request()->input(['filtro']);

        switch ($filter) {

            case ($filter == 'menor-precio'):
                $listItems = Item::with(['brand', 'pattern', 'user', 'type', 'pictures'])
                    ->where('status', 'Activo')
                    ->orderBy('items.price', 'ASC')
                    ->paginate(10);

                break;

            case ($filter == 'mayor-precio'):
                $listItems = Item::with(['brand', 'pattern', 'user', 'type', 'pictures'])
                    ->where('status', 'Activo')
                    ->orderBy('items.price', 'DESC')
                    ->paginate(10);
                break;

            case ($filter == 'ultimo-publicado'):
                $listItems = Item::with(['brand', 'pattern', 'user', 'type', 'pictures'])
                    ->where('status', 'Activo')
                    ->orderBy('items.created_at', 'DESC')
                    ->paginate(10);
                break;

            default;
        }

        $countItems = Item::count();

        $provinces = Province::all();

        $types = Type::all();

        $maxPrice = Item::max('price');

        $minYear = Item::min('year');

        return view('web.items.list', compact('listItems', 'countItems', 'provinces', 'types',
            'province', 'maxPrice', 'minYear', 'priceTo', 'priceFrom'));
    }

    public function search(Request $request)
    {
        $provinceName = Province::where('id', $request->province)
            ->first();

        $priceFrom = Str::before($request->price, ',');
        $priceTo = Str::after($request->price, ',');
        $province = $request->province;
        $type = $request->type;
        $yearFrom = Str::before($request->year, ',');
        $yearTo = Str::after($request->year, ',');

        $listItems = Item::with(['brand', 'pattern', 'user', 'type', 'pictures','user.dealer','user.province','user.region'])
            ->where('status', 'Activo')
            ->whereBetween('price', array($priceFrom, $priceTo))
            ->whereBetween('year', array($yearFrom, $yearTo))
            ->Type($type)
            ->Province($province)
            ->paginate(10);

        $provinces = Province::all();

        $types = Type::all();

        $maxPrice = Item::max('price');

        $minYear = Item::min('year');

        $typeName = Type::where('id', $type)
            ->first();

        return view('web.items.list', compact('listItems', 'provinces', 'types',
            'provinceName', 'maxPrice', 'minYear', 'typeName', 'priceTo', 'priceFrom', 'yearTo', 'yearFrom'));

    }

    public function itemDetail($id)
    {
        $item = Item::where('id', $id)
            ->first();

        $itemPicture = Picture::where('item_id', $item->id)
            ->first();

        Item::find($id)->increment('visit');

        $itemsRelated = Item::with(['brand', 'pattern', 'user', 'type','pictures','user.province','user.region'])
            ->where('type_id', $item->type_id)
            ->where('id', '!=', $item->id)
            ->take(4)
            ->get();

        $itemPayments = ItemPayment::with(['payment'])
            ->where('item_id', $item->id)
            ->get();

        $pictures = Picture::where('item_id', $id)
            ->get();

        $equipmentItems = EquipmentItem::with(['equipment'])
            ->where('item_id', $id)
            ->get();

        return view('web.items.detail', compact('item', 'equipmentItems', 'pictures', 'itemsRelated', 'itemPayments','itemPicture'));
    }

    public function itemPdfDetail($id)
    {
        $item = Item::where('id', $id)
            ->first();

        $picture = Picture::where('item_id', $id)
            ->first();

        $data = [
            'picture' => 'https://dedosruedas.com.ar/users/' . $item->user_id . '/images/items/700x700-' . $picture->name,
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
            'typeEngine' => $item->typeEngine,
            'barter' => $item->barter,
        ];

        return \PDF::loadView('web.parts._pdfDownload', $data)
            ->download($item->brand->name . ' ' . $item->pattern->name . '.pdf');
    }

    public function compare(Request $request)
    {

        for ($i = 0; $i < count($request['compare']); $i++) {
            $items[] = Item::with(['pictures', 'brand', 'pattern','type'])
                ->where('items.id', $request->compare[$i])
                ->first();
        }

        return view('web.items.compare', compact('items'));
    }
}
