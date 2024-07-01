<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthentication
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
        // if(empty(Auth::check())){
        //     return redirect()->route('login')->with('error','You need to login.'); 
        // }else{
        //     return $next($request);
        // }

        if(Auth::user()->role_id == 3){
            return $next($request);
        }else{
            return redirect()->route('home')->with('error','You are not authorized.');
        }
        
    }
}
