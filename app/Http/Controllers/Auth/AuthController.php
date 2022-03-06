<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function getLogin(){
        if(auth()->user()){
            return redirect('miracle77/dashboard');
        }

        return view('auth.admin_login');
    }

    public function submitLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
        ]);

        $credentials = $request->only('email','password');
        $credentials['role'] = 'admin';

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect(route('dashboard'));
        }else{
            return redirect()->back()->with('danger','Email or Password is incorrect!');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
