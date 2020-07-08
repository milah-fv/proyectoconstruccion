<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index');
    }

    public function indexJson()
    {
		$model = Customer::all();
		
		$model->each(function($customer)
		{
			
			$customer->shop = $customer->orders->count(); 
		});
		
		$data = datatables()->of($model)
		->addColumn('btn', 'admin.customer.actions')
		->rawColumns(['btn'])
		->toJson();
		return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit',[
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->name = $request->name;
        $customer->last_name =  $request->last_name;
        $customer->celphone = $request->celphone;
        $customer->phone = $request->phone;
        
        $customer->dni = $request->dni;

        $customer->actived = $request->actived == 'on' ? '1':'0';
        $customer->verified = $request->verified == 'on' ? '1':'0';

        if($request->password)
        {
            $customer->password = Hash::make($request->password);
        }
        $customer->save();
        Alert::success('Cliente actualizado correctamente');
        return redirect('admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
