<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        //dd(Route::getCurrentRoute()->getActionName());
        //dd(Route::getCurrentRoute()->getName());
        // dd(auth()->user());
        //dd($request->route()->getName());
        //dd($request->route()->getActionMethod());
        //dd($request->route()->getAction());
        //dd($request->route()->parameters());
        return $next($request);
    }
}
