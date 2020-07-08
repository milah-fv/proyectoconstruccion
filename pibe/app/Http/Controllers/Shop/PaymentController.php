<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;
// use App\Document;
use App\User;
use Culqi\Culqi;
use App\Order;
use App\Product;
use App\Payment;
use App\PaymentType;
use App\Invoice;
use App\Shipping;
use App\Message;
use App\Notifications\NewOrderNotification;
use App\Mail\OrderMail;
use App\Mail\OrderMailDeposit;
use App\Mail\OrderAdmin;
use Mail;

class PaymentController extends Controller
{
    public function checkout()
	{
		$products = Cart::content();
		$total_cart = Cart::subtotal(2,'.','');
		$customer = Auth('web')->user();
		// $documents = Document::all();

		$shipping = $this->getShippingPrice();
		$paymentType1 = PaymentType::where('id', '=', 1)->get()->first();
		$paymentType2 = PaymentType::where('id', '=', 2)->get()->first();
		$discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
		
		return view('cart.payment.checkout',
		[
			'products' => $products,
			'total_cart' => $total_cart,
			'customer' => $customer,
			// 'documents' => $documents,
			'shipping' => $shipping,
			'paymentType1' => $paymentType1,
			'paymentType2' => $paymentType2,
			'discount' => $discount,
            'newSubtotal' => $newSubtotal,
		]);

    }
    
    public function sucess(Request $request)
	{
		$shipping = $this->getShippingPrice();

		if($request->method == 'card')
		{
			return $this->creditCard($request,$shipping);			
		}
		else if($request->method == 'deposit')
		{
			return $this->deposit($request,$shipping);
		}
	}

	public function deposit($request,$shipping)
	{
		$discount = session()->get('coupon')['discount'] ?? 0;
		$total = (Cart::subtotal(2,'.','') - $discount);
		if($request->shipping == 'agency_shipping')
		{
			$total = $total + $shipping;
		}
		$this->createOrder($request,3,$total,null);

		 session()->forget('coupon');
		return view('cart.payment.compraExitosaDeposito');
	}
	
	public function creditCard($request,$shipping)
	{
		$discount = session()->get('coupon')['discount'] ?? 0;
		$total = (Cart::subtotal(2,'.','') - $discount);

		$SECRET_KEY = "sk_test_FFGKSx71aToIoNVg";

		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		if($request->shipping == 'agency_shipping')
		{
			$total = $total + $shipping;
		}

		$payment = $culqi->Charges->create(
			array(
				"amount" => $total * 100,
				"capture" => true,
				"currency_code" => "PEN",
				"description" => "Ventas en línea El Pibe",
				"email" => Auth('web')->user()->email,
				"installments" => 0,
				"source_id" => $request->token
			  )
		   );
		$this->createOrder($request,2,$total,$payment->reference_code);

		$returnHTML = view('cart.payment.compraExitosa')->render();
		return response()->json(array('success' => true, 'html'=>$returnHTML));
	}

	public function createOrder($request,$state,$total,$reference_code)
	{
		// Venta
        $order = Order::create([
            'customer_id' => Auth::user()->id,
            'name' => $request->order_name,
			'last_name' => $request->order_paternal_surname,
			'dni' => $request->order_num_document,
            'state_id' => $state,
        ]);
        
		$meOrder = Order::find($order->id);

		$payment = new Payment;
		$payment->amount = $total;
		// Envio? Recojo en tienda?
		if($request->shipping == 'agency_shipping')
		{
			$shipping = new Shipping;
			$shipping->departament = $request->department;
			$shipping->province = $request->province;			
			$shipping->address = $request->address;	
			$shipping->referenceAddress = $request->referenceAddress;	
			$shipping->price = $this->getShippingPrice();
			$meOrder->shipping()->save($shipping);
		}
		// Mensaje
		if($request->message)
		{
			$note = Message::create([
				'text' => $request->message,
				'customer_id' => Auth()->user()->id,
				'order_id' => $meOrder->id
			]);
		}
		// Metodo de pago
		if($request->method == 'card')
		{
			foreach(Cart::content() as $product) 
			{
				$productFind = Product::findOrFail($product->id);
				$productFind->stock = $productFind->stock - $product->qty;
				$productFind->save();
				
				$meOrder->products()->attach($product->id,['quantity' => $product->qty,'size' => $product->options->size]);
			}
			$payment->reference_code = $reference_code;			
			$payment->payment_type_id = 1;

		}
		else
		{
			foreach(Cart::content() as $product) 
			{
				$meOrder->products()->attach($product->id,['quantity' => $product->qty,'size' => $product->options->size]);
			}
			$payment->payment_type_id = 2;
		}
		$meOrder->payment()->save($payment);
		// Fin metodo de pago


		// Comprobante de pago
		if($request->comprobante == 'factura')
		{
			$comprobante = new Invoice;
			$comprobante->order_id = $meOrder->id;
			$comprobante->ruc = $request->invoice_ruc;
			$comprobante->razon_social = $request->invoice_razon_social;			
			$comprobante->serie = str_random(4);
			$comprobante->number = str_random(4);
			$comprobante->invoice_type_id = 2;

		}
		else
		{	
			$comprobante = new Invoice;
			$comprobante->order_id = $meOrder->id;
			$comprobante->serie = str_random(4);
			$comprobante->number = str_random(4);
			$comprobante->invoice_type_id = 1;
		}
		$meOrder->invoice()->save($comprobante);
		// Fin comprobante de pago
		
		if($request->method == 'card')
		{
			Mail::to($meOrder->customer->email)->send(new OrderMail($meOrder));	
		}
		else
		{
			Mail::to($meOrder->customer->email)->send(new OrderMailDeposit($meOrder));	
		}

		Mail::to('elpibehuancayo@gmail.com')->send(new OrderAdmin($meOrder));	
        // $this->sendNotification($meOrder);
		Cart::destroy(); 
		session()->forget('coupon');	
	}

	public function getShippingPrice()
	{
		$products = Cart::content();

		$weight =[];
		foreach($products as $product)
		{
			array_push($weight,$product->options->weight);
		}

		if(array_sum($weight) < 5000)
		{
			$shipping = 10;
		}
		else
		{
			$shipping = 15;
		}
		return $shipping;
	}
	
	// public function sendNotification($order)
	// {
	// 	$users = User::all();
	// 	$order->sd = $order->payment->paymentType->name;
	// 	$order->date = $order->created_at->diffForHumans();

	// 	foreach($users as $user)
	// 	{
	// 		\Notification::send($user,new NewOrderNotification($order));				
	// 	}
	// }
}
