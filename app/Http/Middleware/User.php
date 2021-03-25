<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->type === 1 || $request->user()->type === 2){
            abort(404);
        }
        return $next($request);
    }
}
