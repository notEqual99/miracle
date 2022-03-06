<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /************ admin login *************/
    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    public function adminLogin(Request $request)
    {
        // return "ok";
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)):
            return redirect()->to('miracle77/login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);

        // $this->validate($request, [
        //     'username'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        // if (Auth::guard('admin')->attempt(['email' => $request->username, 'password' => $request->password], $request->get('remember'))) {
        //     return redirect(route('admin.dashboard.index'));
        // }
        // return redirect()->back()->with('danger','Username and Password not Match');
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }
}
