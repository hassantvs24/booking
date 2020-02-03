<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $access_name = Route::current()->getName();
           // dd(Auth::user()->access($access_name));
            if(!Auth::user()->access($access_name)){
                return redirect()->route('front.access');
            }
        }

        return $next($request);
    }
}
