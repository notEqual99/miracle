<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
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
        if(!auth()->check()){
            return redirect('/miracle77/login');
        }

        if(auth()->user()->role == "admin"){
            return $next($request);
        }

        return redirect()->back()->with(‘error’,"You don't have admin access.");
        // if(auth()->check()){
        //     if(auth()->user()->role == 'customer'){
        //         return redirect('/miracle77/login');
        //     }
        // }
        // return $next($request);
    }
}
