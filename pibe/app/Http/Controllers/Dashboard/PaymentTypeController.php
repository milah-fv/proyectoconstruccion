<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentType;
Use Alert;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      	$payments = PaymentType::all();
        return view ('admin.paymentType.index',[
            'payments' => $payments]);
       
    }

     public function edit($id)
    {
        $payment = PaymentType::findOrFail($id);
        return view('admin.paymentType.edit',['payment' =>$payment]);
    }

    public function update(Request $request, $id)
    {
        $payment = PaymentType::findOrFail($id);
        $payment->actived = $request->actived == 'on' ? '1':'0';
        $payment->save();
        // Alert::success('Opcion de Pago actualizada correctamente');
        return redirect('/admin/paymentOptions');
    }
}