<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(Auth::guard('admin')->check()){
            return 'miracle77/dashboard/';
        }else if(Auth::guard('customer')->check()){
            return 'customer/account/';
        }else{
            return '/';
        }
    }
}
