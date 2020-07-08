<?php

namespace App\Http\Controllers;

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
      	$boucher = Boucher::where('customer_id', Auth('web')->user()->id)->latest()->get();

		return view('customer.boucher.index',
		[
          'boucher' => $boucher
        ]);
	}

    public function create()
    {
         $orders = Order::where('customer_id', Auth('web')->user()->id)->latest()->get();
        return view('customer.boucher.create',[
          'orders' => $orders,
          ]);
        // Auth('web')->user()->id
        // session("web")->id
    }

    public function store(Request $request)
    {
         if($request->hasFile('image'))
        {
            $cover =$request->file('image');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(300,500)->save('img_bouchers/' .$fileNameCover);
        }

        Boucher::create([
            'order_id' => $request->orders,
            'customer_id' => Auth('web')->user()->id,
            'image' => "img_bouchers/$fileNameCover",
        ]);
        Alert::success('Boucher Enviado correctamente');
        return redirect('profile/boucher'); 
    }

    public function show($id)
    {
  
        $boucher = Boucher::findOrFail($id);
        return view('customer.boucher.boucherMostrar',[
            'boucher' => $boucher
        ]);
    }
 
    public function canceled($id)
    {
        $boucher = Boucher::findOrFail($id);
        \File::delete($boucher->image);             
        $boucher->delete();
        return back();

    }
}
