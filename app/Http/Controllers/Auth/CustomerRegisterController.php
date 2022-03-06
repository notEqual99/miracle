<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerRegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function register(RegisterRequest $request) 
    {
       $user = User::create($request->validated());
    
       event(new Registered($user));
    
       auth()->login($user);
    
       return redirect('/')->with('success', "Account successfully registered.");
    }
}
