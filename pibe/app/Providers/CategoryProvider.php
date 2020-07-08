<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Category;
use App\AdditionalFeature;

class CategoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer("*",function($view) {
        //     $providerCategories = Category::latest()->take(7)->get();

        //     $plus = AdditionalFeature::findOrFail(1);
        //     if($plus->gif)
        //     {
        //         $plus->gif = url($plus->gif);
        //     }
        //     if($plus->banner)
        //     {
        //         $plus->banner = url($plus->banner);        
        //     }

        //     $view->with([
        //       'providerCategories'=> $providerCategories,
        //       'plusProvider' => $plus
        //     ]);
        //   });
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