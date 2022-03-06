<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('dashboard');
              }
              break;
            case 'customer':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('account');
            }
            break;
            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/home');
              }
              break;
          }
          return $next($request);
    }
}
