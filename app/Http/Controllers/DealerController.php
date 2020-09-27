<?php

namespace App\Http\Controllers;

use App\Dealer;
use App\Item;
use App\Province;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        $dealers = Dealer::with(['user'])
            ->paginate(7);

        $provinces = Province::all();

        return view('web.dealer.index', compact('dealers', 'provinces'));
    }

    public function detail($nameAgency, $id)
    {
        $dealer = Dealer::find($id);

        $items = Item::with(['brand', 'pattern', 'type'])
            ->join('pictures', 'items.id', 'pictures.item_id')
            ->where('items.user_id', $dealer->user_id)
            ->paginate(3);

        return view('web.dealer.detail', compact('dealer', 'items'));
    }


    public function search(Request $request)
    {
        $dealers = Dealer::join('users', 'dealers.user_id', 'users.id');
        if ($request->province) {
            $dealers->where('users.province_id', $request->province);
        }
        if ($request->nameAgency) {
            $dealers->where('dealers.nameAgency', 'LIKE', "%$request->nameAgency%");
        }
        $dealers = $dealers->paginate(7);

        $provinces = Province::all();

        return view('web.dealer.index', compact('dealers', 'provinces'));
    }

    public function filterWord(Request $request)
    {
        $word = request()->input(['letra']);

        $dealers = Dealer::where('nameAgency', 'LIKE', "$word%")
            ->paginate(7);

        $provinces = Province::all();

        return view('web.dealer.index', compact('dealers', 'provinces'));
    }
}
