<?php

namespace App\Http\Controllers\Shop;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function store(Request $request)
    {
        $coupon = Coupon::where("code", $request->coupon_code)->first();
        if (!$coupon)
        {
            return redirect()->back()->with('cupon','Cupón invalido. Por favor, intente de nuevo'); 
        }
        else{
            $coupon = Coupon::where("code", $request->coupon_code)->first();
            if ($coupon->enabled ==0) {
                return redirect()->back()->with('cupon','Este cupón no esta activo actualmente.'); 
            }
            $expiry_date = $coupon->expiry_date;
            $current_date = date('Y-m-d');
            if ($expiry_date < $current_date) {
                return redirect()->back()->with('cupon','Este cupón ha expirado.'); 
            }
            $total_cart = Cart::subtotal(2,'.','');
            $min_amount = $coupon->min_amount;
            if ($total_cart < $min_amount) {
                return redirect()->back()->with('cupon','El monto minimo de compras para poder aplicar este cupón es S/. '. $min_amount); 
            }
            // ,  strtotime ( '- 1 day' )
        }


        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal()),
            ]);

        return redirect()->back()->with('cupon-succ', 'Cupon aplicado correctamente');
    }

    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->back();
    }
}
