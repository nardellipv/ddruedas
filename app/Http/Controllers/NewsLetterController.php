<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsLetterRequest;
use App\NewsLetter;

class NewsLetterController extends Controller
{
    public function add(NewsLetterRequest $request)
    {
        NewsLetter::create([
           'email' => $request->email,
        ]);

        notify()->success('Gracias por suscribirte a nuestro newsletter.', 'Suscripción Correcta');
        return back();
    }
}
