<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function authenticated(Request $request, $customer)
    {
        if (!$customer->verified) 
        {
            auth()->logout();
            return back()
                    ->with('warning','Tu cuenta aún no está confirmada, por favor verifica tu correo electrónico');
        }
        if (!$customer->actived) 
        {
            auth()->logout();
            return back()
                    ->with('error','Lo sentimos su cuenta ha sido suspendida.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function logout()
    {
      Auth::guard('web')->logout();
      return redirect('/');
    }
}
