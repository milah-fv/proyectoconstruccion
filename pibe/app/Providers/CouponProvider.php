<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Coupon;

class CouponProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer("*",function($view) {
            $current_date = date('Y-m-d', strtotime('- 1 day'));
            $coupon = Coupon::where('published', 1)->where('enabled', 1)->where('expiry_date', '>' , $current_date)->latest()->take(1)->get();
            $view->with([
            'coupon'=> $coupon,
            ]);
        });
       // 
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
