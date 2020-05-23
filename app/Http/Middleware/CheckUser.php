<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->username == $request->username) {
            return $next($request);
        } elseif (Auth::user()->id == $request->userId) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
