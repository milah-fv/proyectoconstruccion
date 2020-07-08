<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Boucher;
// use App\Document;
use Auth;
use App\Rules\RealEmail;

class CustomerController extends Controller
{
    public function profile()
    {  
        $customer = Auth('web')->user();
        // $documents = Document::all();

        return view('customer.editarPerfil',[
            'customer' => $customer,
            // 'documents' => $documents
        ]);
    }
    public  function orders()
    {
        $orders = Auth('web')->user()->orders()->paginate(5);
        return view('shop.profile.order.orders',[
            'orders' => $orders
        ]);
    }
        
    public  function completarPerfil()
    {
        $customer =  Auth()->user();
        // $documents = Document::all();
        return view('customer.pagoCompletarDatos',[
            'customer' => $customer,
            // 'documents' => $documents
        ]);
    }
    public  function completarPerfilPago(CustomerRequest $request)
    {
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        // $customer->document_id = $request->type_document;
        $customer->dni = $request->dni;
        $customer->celphone = $request->celphone;
        $customer->phone = $request->phone;
        
        $customer->save();

        return redirect('/checkout');
    }

    public  function home()
    {
        $user = Auth('web')->user();
        return view('customer.editarPerfil',[
            'user' => $user
        ]);
    }

    public  function purchases()
    {
        $user = Auth('web')->user();
        return view('shop.profile.purchases',[
            'user' => $user
        ]);
    }

    public  function edit_profile(CustomerRequest $request)
    {
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->dni = $request->dni;
        $customer->celphone = $request->celphone;
        $customer->phone = $request->phone;
        
        $customer->save();

        return back()->with('perfilEditado', '¡Datos actualizados correctamente!');
    }

    public function changePassForm($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.changePass',
        [
            'customer' => $customer
        ]);
    }


    public function changePass(Request $request)
    {
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        if (!(Hash::check($request->get('current-password'), Auth('web')->user()->password))) {
            // The passwords matches
            return response()->json(['error' => 'Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.']);
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return response()->json(['error'=>'La nueva contraseña no puede ser igual a su contraseña actual. Por favor, elija una contraseña diferente.']);
        }


        //Change Password
        $user = Auth('web')->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return response()->json(['success' => 'Contraseña cambiada correctamente']);

    }

    public  function wish_list()
    {
        return redirect('/profile/data');
    }

    // public  function boucher()
    // {
    //     $boucher = Boucher::all()->paginate(5);
    //     // $orders = Auth('web')->user()->orders()->paginate(5);
    //     return view('shop.profile.order.orders',[
    //         'boucher' => $boucher
    //     ]);
    // }
}
