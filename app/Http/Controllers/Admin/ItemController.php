<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    public function itemOk($id)
    {
        $item = Item::find($id);
        $item->status = 'Activo';
        $item->save();


        Mail::send('emails.itemApprove', ['item' => $item], function ($msn) use ($item) {
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Publicación ' . $item->brand->name . ' ' . $item->pattern->name . ' Aprobada');
            $msn->to($item->user->email, $item->user->name);
        });

        return back();
    }

    public function itemNoOk(Request $request, $id)
    {
        $item = Item::find($id);
        $item->status = 'Rechazado';
        $item->save();


        Mail::send('emails.itemNoOk', ['request' => $request, 'item' => $item], function ($msn) use ($request, $item) {
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Publicación ' . $item->brand->name . ' ' . $item->pattern->name . ' Rechazada');
            $msn->to($item->user->email, $item->user->name);
        });

        return back();
    }
}
