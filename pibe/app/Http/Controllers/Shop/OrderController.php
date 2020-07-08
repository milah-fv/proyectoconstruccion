<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Shipping;
use App\Invoice;
use App\Payment;
use App\OrderDetail;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth('web')->user()->orders()->latest()->paginate(5);
        return view('customer.pedidos.pedidos',[
            'orders' => $orders
        ]);
    }
    public function show($id)
    {
        $data = Crypt::decrypt($id);
        $order = Order::findOrFail($data['id']);
        return view('customer.pedidos.pedidoMostrar',[
            'order' => $order
        ]);
    }

    public function canceled($id)
    {
        $data = Crypt::decrypt($id);
        $order = Order::findOrFail($data['id']);
        $order->state_id = 1;
        $order->save();
        
        return back();
    }

    public function pdfInvoice(Request $request, $id)
    {
        $order = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
        ->select('orders.id', 'orders.created_at', 'orders.state_id', 'customers.name', 'customers.last_name', 'customers.dni', 'customers.email', 'customers.celphone', 'customers.phone')
        ->where('orders.id', '=', $id)
        ->orderBy('orders.id', 'desc')->take(1)->get();

        $shipping = Shipping::join('orders', 'shippings.order_id', '=', 'orders.id')
        ->select('shippings.address', 'shippings.referenceAddress', 'shippings.price')
        ->where('shippings.order_id', '=', $id)->get();


        $invoice = Invoice::join('orders', 'invoices.order_id', '=', 'orders.id')
        ->select('invoices.invoice_type_id', 'invoices.serie', 'invoices.number', 'ruc', 'razon_social')
        ->where('invoices.order_id', '=', $id)->get();

        $payment = Payment::join('orders', 'payments.order_id', '=', 'orders.id')
        ->select('payments.payment_type_id', 'payments.amount')
        ->where('payments.order_id', '=', $id)->get();

        $orderDetails = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('order_details.quantity', 'products.name as product', 'products.price')
        ->where('order_details.order_id', '=', $id)
        ->orderBy('order_details.id', 'desc')->get();



        $pdf = \PDF::loadview('pdf.boleta', ['order' => $order, 'shipping' => $shipping, 'invoice' => $invoice, 'payment' => $payment, 'orderDetails' => $orderDetails]);
        return $pdf->download('Venta_'.$order[0]->id.'.pdf'); 
    }
}
