<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;
use App\Product;
use App\Order;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customersCount = Customer::all()->count();
        $productsCount = Product::all()->count();
        $orderCountAprobbed = Order::all()->where('state_id', '=', 7)->count();
        $orderCount = Order::all()->count();
                
        return view('admin.home',
                    ['customersCount' => $customersCount,
                    'productsCount' => $productsCount,
                    'orderCountAprobbed' => $orderCountAprobbed,
                    'orderCount' => $orderCount]);
    }
}
