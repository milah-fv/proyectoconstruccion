<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;
use App\Mail\VerifyMail;
use Mail;

class ResendEmailController extends Controller
{
    public function resend()
    {
        return view('auth.resend');
    }

    public function resendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|exists:customers,email',
        ],[
            'email.exists'  => 'No se ha encontrado un usuario con esa dirección de correo.'
        ]);

        $customer = Customer::where('email',$request->email)->first();

        Mail::to($customer->email)->send(new VerifyMail($customer));

        return redirect('/login')->with('status', 'Le enviamos un código de activación. Verifique su correo electrónico y haga clic en el enlace para verificar.');
    }

}
