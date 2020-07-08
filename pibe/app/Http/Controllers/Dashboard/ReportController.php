<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use DateTime;
use Yajra\DataTables\EloquentDataTable;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }

    public function topProducts(Request $request)
    {
        if($request->date_init)
        {
            $date_init = new \DateTime($request->date_init);
            $date_end = new \DateTime($request->date_end);
        }
        else
        {
            $date = date("Y-m-d", strtotime("-1 month", strtotime(date('Y-m-j'))));  
            $date_init = new \DateTime($date);
            $date_end = new \DateTime();  
        }
        
        $model = Product::top10Product($date_init,$date_end);

        

        $data = datatables()->of($model)->toJson();
        return $data;
    }

    public function topCustomerForm(Request $request)
    {
        return view('admin.report.top_customers');
    }

    public function topCustomer(Request $request)
    {
        if($request->date_init)
        {
            $date_init = new \DateTime($request->date_init);
            $date_end = new \DateTime($request->date_end);
        }
        else
        {
            $date = date("Y-m-d", strtotime("-1 month", strtotime(date('Y-m-j'))));  
            $date_init = new \DateTime($date);
            $date_end = new \DateTime();  
        }
        
        $model = Order::topCustomer($date_init,$date_end);

        $model->each(function($model,$index)
        {
            $index++;
            $model->top = $index;
            // $model->last_name = "$model->last_name";
            
        });

        $data = datatables()->of($model)->toJson();
        return $data;
    }


    public function purchasesForm(Request $request)
    {
        return view('admin.report.purchases');
    }

    public function purchases(Request $request)
    {
        if($request->date_init)
        {
            $date_init = new \DateTime($request->date_init);
            $date_end = new \DateTime($request->date_end);
        }
        else
        {
            $date = date("Y-m-d", strtotime("-1 month", strtotime(date('Y-m-j'))));  
            $date_init = new \DateTime($date);
            $date_end = new \DateTime();  
        }
        
        $model = Order::purchases($date_init,$date_end);

        $model->each(function($model)
        {
            $model->amount = "S/ $model->amount";

            $date = new \DateTime($model->created_at);
            $model->created_at = $date->format('Y-m-d'); 
            $model->customer = "$model->name $model->last_name";            
                       
        });


        $data = datatables()->of($model)->toJson();
        return $data;
    }

    
    public function stockProductForm()
    {
        return view('admin.report.stock_products');
    }

    public function stockProduct()
    {
        $model = Product::miniumStockProducts();
        $data = datatables()->of($model)->toJson();
        return $data;
    }
}
