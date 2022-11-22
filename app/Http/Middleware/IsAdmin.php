<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->username === 'admin') {
            return $next($request);
        }
        if (Auth::user() && Auth::user()->username === 'superadmin') {
            return $next($request);
        }
        abort(403);
    }
}
