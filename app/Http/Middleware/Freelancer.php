<?php


namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class Freelancer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->type === 1 || $request->user()->type === 2 || $request->user()->type === 0){
            abort(404);
        }
        return $next($request);
    }
}
