<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Http\Requests\AccessoryContactSellerRequest;
use App\Http\Requests\ContactSellerRequest;
use App\Http\Requests\SendItembyMailRequest;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendItem(SendItembyMailRequest $request)
    {
        $item = Item::find($request->itemId);

        Mail::send('emails.sendItem', ['request' => $request, 'item' => $item], function ($msn) use ($request, $item) {
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Datos de ' . $item->brand->name . ' ' . $item->pattern->name);
            $msn->to($request->email, $request->name);
        });

        notify()->success('El email se envió con éxito, revisa tu carpeta de spam.', 'Email enviado');
        return back();
    }

    public function contactSeller(ContactSellerRequest $request)
    {
        $item = Item::find($request->item);

        Mail::send('emails.contactSeller', ['request' => $request, 'item' => $item], function ($msn) use ($request, $item) {
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Contacto de ' . $request->name . ' por ' . $item->brand->name . ' ' . $item->pattern->name);
            $msn->to($item->user->email, $item->user->name);
        });

        notify()->success('El email se envió con éxito. Seguramente el vendedor se contactará contigo a la brevedad.', 'Email enviado');
        return back();
    }

    public function contactAccessorySeller(AccessoryContactSellerRequest $request)
    {
        $item = Accessory::find($request->item);

        Mail::send('emails.contactAccessorySeller', ['request' => $request, 'item' => $item], function ($msn) use ($request, $item) {
            $msn->from('no-respond@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Contacto de ' . $request->name . ' en dedosruedas.com.ar');
            $msn->to($item->user->email, $item->user->name);
        });

        notify()->success('El email se envió con éxito. Seguramente el vendedor se contactará contigo a la brevedad.', 'Email enviado');
        return back();
    }
}
