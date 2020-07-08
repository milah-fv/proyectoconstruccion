<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use Yajra\DataTables\EloquentDataTable;
use App\State;
// use App\Document;
use App\Shipping;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index');
    }

    public function indexJson()
    {
        $model = Order::all();
        
        $model->each(function($order)
        {
            $order->payment;
            $order->state;
            $order->customer;
            $order->shipping;
            $order->date = $order->created_at->format('d/m/Y');           
            
        });
        
        $data = datatables()->of($model)
        ->addColumn('btn', 'admin.order.actions')
        ->rawColumns(['btn'])
        ->toJson();
        return $data;
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $states = State::all();
        // $documents = Document::all();

        return view('admin.order.edit',[
            'order' => $order,
            'states' => $states,
            // 'documents' => $documents
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
         $order = Order::findOrFail($id);

        $order->name = $request->order_name;
        $order->last_name = $request->order_last_name;
        // $order->document_id = $request->order_type_document;
        $order->dni = $request->order_dni;
 
        if($order->payment->payment_type_id != 1)
        {
            if($order->state_id != 7)
            {
                if($request->state == 7)
                {
                    foreach($order->products as $product)
                    {
                        if($product->pivot->quantity > $product->stock)
                        {
                            return back()
                                        ->with('error',"Producto: $product->name (stock:$product->stock) sobrepaso su stock");
                        }
                    }
                    foreach($order->products as $product)
                    {
                        $productUpdate = Product::findOrFail($product->id);
                        $productUpdate->stock = $productUpdate->stock - $product->pivot->quantity;
                        $productUpdate->save();
                    }
                }
            }
        }
        $order->state_id = $request->state;
        $order->save();

        if($order->shipping)
        {
            $order->shipping->update([
                'province' => $request->province,
                'departament' => $request->departament
            ]);
        }
        return redirect('admin/orders');
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
