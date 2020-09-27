<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;

class JobsController extends Controller
{
    public function userRegister()
    {
        $users = User::all();

        $userCount = User::count();

        Mail::send('emails.jobs.admin.registerUser', ['users' => $users, 'userCount' => $userCount], function ($msj) {
            $msj->from('no-responder@dedosruedas.com.ar', 'dedosruedas');
            $msj->subject('Usuario registrados');
            $msj->to('info@dedosruedas.com.ar', 'Pablo');
        });
    }
}
