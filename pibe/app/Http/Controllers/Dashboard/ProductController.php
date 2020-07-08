<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use Image;
use App\ProductImage;
use App\Product;
use App\Color;
use App\Size;
use App\Category;
use Yajra\DataTables\EloquentDataTable;
Use Alert;


class ProductController extends Controller
{

    public function index()
    {
      	$products = Product::latest()->get();

		return view('admin.product.index',
		[
          'products' => $products
        ]);
	}

	public function indexJson()
    {
		$model = Product::all();
		
		$model->each(function($product)
		{
			$product->cover_image = url($product->cover_image);
			$product->price = "S/.$product->price";
			$product->weight = "$product->weight grm";
			$product->category;
			$product->color;
			$product->sizes;
		});
		
		$data = datatables()->of($model)
		->addColumn('btn', 'admin.product.actions')
		->rawColumns(['btn','description'])
		->toJson();
		return $data;
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.product.create',[
          'categories' => $categories,
          'sizes' => $sizes,
          'colors' => $colors,
          'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
      	$cover =$request->file('cover_image');
		$fileNameCover = $cover->hashName();
		Image::make($cover)->resize(500,500)->save('img_product/' .$fileNameCover);

		$stock=$request->stock;
		if($request->stock == null)
		{
			foreach($request->quantities as $quantities) 
			{
				$stock+=  $quantities;
			}
		}

        $producto = Product::create([
           'name' =>$request->name,
           'old_price' =>$request->oldprice,
           'price' =>$request->price,
           'cover_image' => ("img_product/$fileNameCover"),
           'stock' =>$stock,
           'features' =>$request->features,
           'description' =>$request->description,
           'state' =>$request->state,
           'weight' =>$request->weight,
           'category_id' => $request->categories,
           'color_id' =>$request->colors,
        ]);


        $meProduct = Product::find($producto->id);
          	if($request->stock == null)
          	{
				foreach($request->sizes as $index => $id) 
				{
				$quantity = isset($request->quantities[$index]) ? $request->quantities[$index] : null;
				$meProduct->sizes()->attach($id, compact('quantity'));
				}
          	}


         //$meProduct->sizes()->attach($request->sizes,$request->quantities);

		if ($request->file('images') != null) 
		{
		   	foreach ($request->file('images') as  $image) 
		   	{
				$fileName = $image->hashName();
				Image::make($image)->resize(500,500)->save('img_product/' .$fileName);

				$imagen = ProductImage::create
				([
					'product_id' => $producto->id,
					'image' =>$fileName,
				]);
            }
         }

        Alert::success('Producto creado correctamente');
        return redirect('admin/product');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$categories = Category::all();
		$sizes = Size::all();
		$colors = Color::all();
		$product = Product::findOrFail($id);
		$productSizeId = [];

		foreach ($product->sizes as $productSize) 
		{
			$productSizeId[] = $productSize->id;
		}


		return view('admin.product.edit',[
			'categories' => $categories,
			'sizes' => $sizes,
			'colors' => $colors,
			'categories' => $categories,
			'product' => $product,
			'productSizeId' => $productSizeId,
		]);
    }


    public function update(ProductRequest $request, $id)
    {
		$product = Product::findOrFail($id);

		//$values = $data[$request->sizes['name' => $request->quantities]];
		
				
      	if($request->hasFile('cover_image'))
		{
			$cover =$request->file('cover_image');
			$fileNameCover = $cover->hashName();
			Image::make($cover)->resize(500,500)->save('img_product/' .$fileNameCover);
			\File::delete('img_product/'.$product->cover_image);

			$product->cover_image = "img_product/$fileNameCover";
		}


		$stock=$request->stock;
		$syncData = [];
		
		if($request->stock == null)
		{
			foreach($request->quantities as $quantities) 
			{
				$stock+=  $quantities;
			}

			foreach($request->sizes as $index => $id) 
			{
				$quantity = isset($request->quantities[$index]) ? $request->quantities[$index] : null;
				$syncData= $this->array_push_assoc($syncData, $id , compact('quantity'));
			}
			
			
		}
		$product->sizes()->sync($syncData); 
		

		$product->stock = $stock;
		$product->old_price = $request->oldprice;
		$product->price = $request->price;
		$product->weight =$request->weight;
		$product->name =$request->name;
		$product->description = $request->description;
		$product->features = $request->features;
		$product->state = $request->state;
		$product->category_id = $request->categories;
		$product->color_id = $request->colors;



		$product->save();
		Alert::success('Producto actualizado correctamente');
		return redirect('admin/product');
    }


    public function destroy($id)
    {
		$product = Product::findOrFail($id);

		if($product->orders->count() > 0)
		{
			return response()->json(['error' => 'Producto en un pedido'],422);
		}

		$product->sizes()->detach($product->sizes);

		$cover_image = $product->cover_image;


      	\File::delete('img_product/'.$cover_image);

		if ($product->images != null) 
		  	{
				foreach ($product->images as  $image) 
				{
					ProductImage::destroy($image->id);
					\File::delete("img_product/$image->image");
        		}
      		}

		$product->delete();
		return response()->json($product);

    }

    public function storeImage(Request $request, $name)
    {
        $imagePath = $request->file($name)->store('products' ,'public');

        $image = Image::make(Storage::get('public/'.$imagePath))->resize(1200,1485)->encode();

        Storage::put($imagePath, $image);

        return $imagePath;
	}
	
	function array_push_assoc($array, $key, $value)
	{
		$array[$key] = $value;
		return $array;
	}
}
