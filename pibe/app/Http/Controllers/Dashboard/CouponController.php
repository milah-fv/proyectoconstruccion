<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use App\Http\Requests\CouponRequest;
Use Alert;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view ('admin.coupon.index');
       
    }

    public function indexJson()
    {
        $model = Coupon::all();
        
        $data = datatables()->of($model)
        ->addColumn('btn', 'admin.coupon.actions')
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
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        Coupon::create([
            'title' => $request->title,
            'published' => $request->published,
            'enabled' => $request->enabled,
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'percent_off' => $request->percent_off,
            'expiry_date' => $request->expiry_date,
            'min_amount' => $request->min_amount,
            

        ]);
        Alert::success('Cupón creado correctamente');
        return redirect('/admin/coupon');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit',[
            'coupon1' => $coupon,
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
        $coupon = Coupon::findOrFail($id);
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->published = $request->published;
        $coupon->enabled = $request->enabled;
        $coupon->value = $request->value;
        $coupon->percent_off = $request->percent_off;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->min_amount = $request->min_amount;
        $coupon->save();
        Alert::success('Cupón actualizado correctamente');
        return redirect('/admin/coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return back();
    }
}
