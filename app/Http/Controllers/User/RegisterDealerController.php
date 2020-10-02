<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterDealerController extends Controller
{
    public function dealerRegister()
    {
        return view('web.user._registerDealer');
    }
}
