<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->type == 'admin') {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
