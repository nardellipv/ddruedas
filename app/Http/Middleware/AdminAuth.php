<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id === 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
