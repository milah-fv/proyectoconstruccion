<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserLoginController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest:user',['except' => ['logout']]);
    }

	public function showLoginForm() 
	{
    	return view('auth.admin_login');
    }

    public function login(Request $request)
    {
		$this->validate($request,[
			'email' => 'required|email',
			'password' => ' required|min:6'
		]);

		if (Auth::guard('user')->attempt([
			'email' => $request->email, 
			'password' => $request->password],
			$request->remember)) 
		{
			return redirect()->intended(route('admin.dashboard'));
		}
		else 
		{
			return redirect()->back()->withInput($request->only('email','remember'));
		}
    }

    public function logout()
    {
		Auth::guard('user')->logout();
		return redirect('/');
    }
}
