<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->type === 'Admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
