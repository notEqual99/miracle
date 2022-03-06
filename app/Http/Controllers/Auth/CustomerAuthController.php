<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        if(auth()->user()){
            return redirect('/');
        }

        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }

        return view('auth.customer_login');
    }

    public function submitLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
        ]);

        $credentials = $request->only('email','password');
        // return $credentials;
        if(Auth::guard('customer')->attempt($credentials)){
            return redirect(route('dashboard'));
        }else{
            $this->showLoginForm();
            return redirect()->back()->with('danger','Email or Password is incorrect!');
        }
    }

    public function showCustomerRegisterForm()
    {
        return view('auth.customer_register');
    }

    protected function customerRegister(Request $request)
    {
        // return $request;
        date_default_timezone_set('asia/yangon');
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if(User::where('phone',$request->phone)->count()>0){
            return back()->with('error', 'This phone number is already register!');
        }

        $customer = User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $cartUserId = User::where('phone',$request->phone)->first()->id;

        $cart = Cart::create([
            'user_id' => $cartUserId,
            'unique_key' => $this->uniqueKey($cartUserId),  
            'status' => 'shopping'
        ]);
        // return $cart;
        return redirect()->route('customer.login')->with('success','Register successful');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function uniqueKey($id)
    {
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $strID = substr(str_shuffle($codeAlphabet), 0, 1);
        $strKey = mt_rand(100, 999);
        $generateID = 'U'.$strID."$id".$strKey;

        $uniqueKey = Cart::where('unique_key', $generateID)->get();
        if (count($uniqueKey) > 0) {
            $this->uniqueKey();
        } else {
            return $generateID;
        }
    }
}
