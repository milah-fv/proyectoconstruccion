<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Image;
use App\Boucher;
use App\Order;
// use App\Tag;
// use App\BlogCategory;
use Yajra\DataTables\EloquentDataTable;
Use Alert;

class BoucherController extends Controller
{
    public function index()
    {
      	$boucher = Boucher::latest()->get();

		return view('admin.boucher.index',
		[
          'boucher' => $boucher
        ]);
	}

    public function indexJson()
    {
        $model = Boucher::latest()->get();
        
        $model->each(function($model)
        {
            $model->image = url($model->image);
        });
                
        $data = datatables()->of($model)
        ->addColumn('btn', 'admin.boucher.actions')
        ->rawColumns(['btn'])
        ->toJson();
        return $data;
    }



    public function show($id)
    {
  
        $boucher = Boucher::findOrFail($id);
        return view('admin.boucher.show',[
            'boucher' => $boucher
        ]);
    }
 
    // public function canceled($id)
    // {
    //     $boucher = Boucher::findOrFail($id);
    //     \File::delete($boucher->image);             
    //     $boucher->delete();
    //     return back();

    // }
}
