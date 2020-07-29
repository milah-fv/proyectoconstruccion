<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Clase Controlador del Carrito de Compras
    |--------------------------------------------------------------------------
    |
    | En esta clase se encuentran los métodos utilizados para el funcionamiento del 
    | carrito de compras de la aplicación.
    |
    */

    /**
     * Función index
     * Función de inicio, ordena los datos para la visualización del carrito
     * @access public
     * Retorna la vista del carrito con los datos de las variables $products, $total, $newSubtotal,
     * @return view 
     */
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

    /**
     * Función Store
     * Método de almacenamiento, clasifica y almacena los productos, para ser llevados al carrito.
     * @access public
     * Retorna valores de parámetros para la función returnCart
     * @return $this->returnCart 
     */
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

    /**
     * Función checkout
     * Método de verificación, lleva los datos obtenidos del carrito hacia la página de checkout,
     * donde se muestra el resúmen de compras.
     * @access public
     * Retorna la vista del resúmen del carrito en la página de checkout
     * @return view vista de resúmen de la compra
     * @param $products Producto del carrito
     * @param $total Total del carrito
     */
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

    /**
     * Función destroy
     * Método de eliminación, elimina un producto del carrito.
     * @access public
     * @param int $id Número de identificación de un ítem del carrito
     * Retorna el total actualizado del carrito, al eliminar un ítem.
     * @return view
     */
    public function destroy($id)
    {
        Cart::remove($id);
        $total = Cart::subtotal();
        return response()->json($total);
    }

    /**
     * Función updateCarrito
     * Método de actualización, actualiza la cantidad del producto en el carrito.
     * @access public
     * Retorna el total actualizado del carrito, al cambiar la cantidad de un ítem.
     * @return back
     */
    public function updateCarrito(Request $request)
    {
        foreach($request->rowId as $index => $id) 
        {
          $qty = isset($request->qty[$index]) ? $request->qty[$index] : null;
          Cart::update($id, $qty);      
        }
        return back();
    }

    /**
     * Función returnCart
     * Método de retorno de valores del carrito
     * @access public
     * @param $product Objeto producto
     * @param $request Especificaciones del producto(Talla, stock)
     * @param $qty Cantidad del producto
     * @param $bol Variable de prueba para aceptación o rechazo de petición
     * Retorna el total y los datos del carrito
     * @return $cart, $total
     */
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
