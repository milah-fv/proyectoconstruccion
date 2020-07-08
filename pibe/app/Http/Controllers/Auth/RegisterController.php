<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\CustomerVerify;
use App\Mail\VerifyMail;
use Mail;
use Illuminate\Http\Request;
use App\Rules\RealEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max' => 'El máximo permitido el 150 caracteres.',
            'last_name.required' => 'El campo apellidos es obligatorio.',
            'last_name.max' => 'El máximo permitido el 150 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.unique' => 'El email ya está registrado.',
            'email.max' => 'El máximo permitido el 150 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.required' => 'El campo contraseña es obligatorio.'
            // 'password.min' => 'La contraseña debe tener minimamente 6 caracteres'
            // 'password.max' => 'El máximo permitido el 150 caracteres.',
        ];

        return Validator::make($data, [
            'name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'email' => ['required','string','email','max:150','unique:customers',
             new RealEmail],
            'password' => 'required|string|min:6|confirmed|max:150',
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $customer =  Customer::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $customerVerify = CustomerVerify::create([
            'customer_id' => $customer->id,
            'token' => str_random(40)
        ]);
 
        Mail::to($customer->email)->send(new VerifyMail($customer));
 
        return $customer;

    }
    public function customerVerify($token)
    {
        $customerVerify = CustomerVerify::where('token', $token)->first();
        if(isset($customerVerify))
        {
            $customer = $customerVerify->customer;
            if(!$customer->verified) 
            {
                $customerVerify->customer->verified = 1;
                $customerVerify->customer->save();
                $status = "Cuenta verificada satisfactoriamente";
            }
            else
            {
                $status = "Cuenta verificada satisfactoriamente";
            }
        }
        else
        {
            return redirect('/login')
                    ->with('warning', "Lo siento, su correo electrónico no puede ser identificado.");
        }
 
        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return view('auth.email_verification',[
            'email' => $user->email,
        ]);
    }
}
