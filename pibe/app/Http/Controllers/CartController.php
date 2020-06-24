<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $products = Cart::content();
        $total = Cart::subtotal();

        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);


        $products->each(function($products)
        {
            if(!$products->options->type)
            {
                $product = Product::findOrFail($products->id);
                if(!$product->sizes->isEmpty())
                {
                    $stock = $product->sizes->where('name',$products->options->size)->first();
                    $products->options->stock = $stock->pivot->quantity;
                }
                else
                {
                    $products->options->stock = $product->stock;    
                }
                $products->options->weight = $product->weight;              
            }
        });
        
        return view('cart.cart',[
            'products' => $products,
            'total' => $total,


            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
        ]);
    }

    
    public function store(Request $request)
    {
        /* Search product */
        $product = Product::findOrFail($request->id);
        $product->cover_image = url($product->cover_image);

        $cart = Cart::content()->where('id', $request->id)->first();
        $qty =  (!$request->qty) ? 1 : $request->qty; 


        
        /* message error stock */
        $stockError = new \stdClass();
        $stockError->message = 'Producto agotado';
        $stockError->image = url('images/stockError.jpg');

        $itemQty = (!$cart) ? null : $cart->qty; 


        /* sold out validatopn */
        if($product->stock <= 0)
        {
            return response()->json($stockError,422);
        }

        if(!empty($itemQty))
        {

            
            if(!$product->sizes->isEmpty())
            {
                $qtySize =  Cart::search(function($cartItem, $rowId) use($request) {
                                return $cartItem->id == $request->id  && $cartItem->options->size == $request->size;
                            })->first();
                if(!empty($qtySize))
                {
                    $stockSizeVa = $product->sizes->where('name',$request->size)->first();
                    if($qtySize->qty + $qty > $stockSizeVa->pivot->quantity)
                    {
                        $stockError->message = 'Stock superado';
                        return response()->json($stockError,422);
                    }
                    return $this->returnCart($product,$request,$qty,true);
                }
        
            }
            
            if($itemQty + $qty > $product->stock)
            {
                $stockError->message = 'Stock superado';
                return response()->json($stockError,422);
            }
            
        }
        if(!$request->size)
        {
            return $this->returnCart($product,$request,$qty,false);
        }
        else
        {
            return $this->returnCart($product,$request,$qty,true);
        }            
    }

    public function checkout()
    {
        $products = Cart::content();
        $total = Cart::subtotal();

        $products->each(function($products)
        {
            $product = Product::findOrFail($products->id);
            if(!$product->sizes->isEmpty())
            {
                $stock = $product->sizes->where('name',$products->options->size)->first();
                $products->options->stock = $stock->pivot->quantity;
            }
            else
            {
                $products->options->stock = $product->stock;
            }
        });
        
        return view('cart.payment.checkout',[
            'products' => $products,
            'total' => $total
        ]);

    }

    public function sucessCheckout()
    {
        
        return view('shop.payment.sucess');

    }

    public function destroy($id)
    {
        Cart::remove($id);
        $total = Cart::subtotal();
        return response()->json($total);
    }

    public function updateCarrito(Request $request)
    {
        foreach($request->rowId as $index => $id) 
        {
          $qty = isset($request->qty[$index]) ? $request->qty[$index] : null;
          Cart::update($id, $qty);      
        }
        return back();
    }

    
    public function returnCart($product,$request,$qty,$bol)
    {
        if($bol)
        {
            $cart = Cart::add(
                $product->id,
                $product->name,$qty,
                $product->price,
                [
                    'img' => $product->cover_image,
                    'size' => $request->size,
                    'stock' => $request->stockSize,
                    'url_id' => url("/product/$product->id"),
                    'weight' => $product->weight
                ]);             
            $total = Cart::subtotal();
            return ['cart' => $cart, 'total' => $total  ];
        }
        else
        {
            $cart = Cart::add(
                $product->id,
                $product->name,$qty,
                $product->price,
                [
                    'img' => $product->cover_image,
                    'size' => $request->size,
                    'stock' => $product->stock,
                    'url_id' => url("/product/$product->id"),
                    'weight' => $product->weight
                ]);             
            $total = Cart::subtotal();
            return ['cart' => $cart, 'total' => $total  ];
        }

    }
}
