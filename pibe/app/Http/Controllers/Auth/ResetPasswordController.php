<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    public function authenticated(Request $request, $customer)
    {
        if (!$customer->verified) 
        {
            auth()->logout();
            return redirect('login')
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
}
