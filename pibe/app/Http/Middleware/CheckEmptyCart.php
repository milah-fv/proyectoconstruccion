<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class CheckEmptyCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = Cart::content();
        if($cart->isEmpty())
        {
            return redirect('/carrito');
        }
        else if(!Auth()->user()->verifiedData())
        {
            return redirect('/');
        }
        return $next($request);
    }
}
