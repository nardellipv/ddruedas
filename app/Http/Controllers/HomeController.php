<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\ContactRequest;
use App\Item;
use App\NewsLetter;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $lastItems = Item::with(['brand', 'pattern','pictures'])
            ->where('status', 'Activo')
            ->where('expire', '>=', now())
            ->orderBy('items.created_at', 'DESC')
            ->take(8)
            ->get();

        /*$recommendItems = Item::with(['brand', 'pattern'])
            ->join('pictures', 'items.id', 'pictures.item_id')
            ->orderBy('year', 'DESC')
            ->take(8)
            ->get();*/

        $lastPosts = Blog::orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        return view('web.index', compact('lastItems', 'recommendItems', 'lastPosts'));
    }

    public function sendContact(ContactRequest $request)
    {
        $news = NewsLetter::where('email', $request->email)
            ->first();

        if(!$news AND $request->newsletter) {
            NewsLetter::create([
                'email' => $request->email,
            ]);
        }

        Mail::send('emails.contactToAdminSite', ['request' => $request], function ($msn) use($request){
            $msn->from('info@dedosruedas.com.ar', 'dedosreuedas.com.ar');
            $msn->subject('Envío del formulario de contacto');
            $msn->to('info@dedosruedas.com.ar', 'Administración');
        });

        notify()->success('Un administrador del sitio lo contactará a la brevedad. Gracias por utilizar dedosruedas.', 'Email enviado');
        return back();
    }
}
