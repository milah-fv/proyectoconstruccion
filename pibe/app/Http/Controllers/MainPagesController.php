<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Size;
use App\Color;
use App\Product;
use Mail;


class MainPagesController extends Controller
{
    public function inicio()
    {
    
        $newProducts = Product::where('state','Nuevo')->where('stock','>',0)->latest()->take(8)->get();
        $newProducts->each(function($products){
          $products->cover_image = url($products->cover_image);
          });

        $saleProducts = Product::where('state','Oferta')->where('stock','>',0)->latest()->take(8)->get();
        $saleProducts->each(function($products){
        $products->cover_image = url($products->cover_image);
          });

        $popularProducts = Product::topProduct(8);

        $popularProducts->each(function($products){
            $products->cover_image = url($products->cover_image);
        });

        return view('home',[
        'newProducts' => $newProducts,
        'saleProducts' => $saleProducts,
        'popularProducts' => $popularProducts,
      ]);

    }

    public function terminos_y_condiciones()
    {
    	return view('terminos_y_condiciones');
    }

    public function productos(Request $request)
    {
        $categories = Category::all();

        $products = Product::where('stock','>',0)->orderBy('id', 'ASC')
        ->latest()
        ->name($request->search)
        ->price($request->min_price,$request->max_price)
        ->paginate(12);

        $products->each(function($products)
        {
            $products->cover_image = url($products->cover_image);
        });

        $colors = Color::all();
        $sizes = Size::all();
        $maxPrice = Product::getMaxPrice();
    
        return view('productos.productos',[
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'maxPrice' => $maxPrice,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price
        ]);
    }

    public function productoDetalle($id)
    {
          $product = Product::findOrFail($id);
          $category = Category::SearchCategory($product->category->slug)->first();
          $relatedProducts = $category->products()->where('id', '!=', $product->id)->take(8)->latest()->get();
          $relatedProducts->each(function($relatedProducts)
          {
            $relatedProducts->cover_image = url($relatedProducts->cover_image);
        });
          return view('productos.productoDetalle',[
            'product' => $product,
            'relatedProducts' => $relatedProducts
          ]);
    }

    public function ajaxProductoDetalle($id) 
    {
      $product = Product::findOrFail($id);
      $product->cover_image = url($product->cover_image);
      $product->sizes;
      $product->color;
      return response()->json($product);
    }

    public function buscarCategoria($slug)    
    {
          $categoryQuery = Category::SearchCategory($slug)->first();
          $products = $categoryQuery->products()->paginate(12);
          $products->each(function($products){
            $products->cover_image = url($products->cover_image);
            });
          $categories = Category::all();
          $colors = Color::all();
          $sizes = Size::all();
          $maxPrice = Product::getMaxPrice();

          return view('productos.productos',[
              'products' => $products,
              'categories' => $categories,
              'colors' => $colors,
              'sizes' => $sizes,
              'categoryQuery' => $categoryQuery,
              'maxPrice' => $maxPrice
          ]);
    }
    
    public function buscarColor($id)    
    {
        $colorQuery = Color::SearchColor($id)->first();
        $products = $colorQuery->products()->paginate(12);

        $products->each(function($products){
            $products->cover_image = url($products->cover_image);
        });
        
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $maxPrice = Product::getMaxPrice();

        return view('productos.productos',[
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'colorQuery' => $colorQuery,
            'maxPrice' => $maxPrice
        ]);
    }

      public function buscarTalla($name)    
    {
          $sizeQuery = Size::SearchSize($name)->first();
          $products = $sizeQuery->products()->paginate(12);
          $products->each(function($products){
            $products->cover_image = url($products->cover_image);
        });
          $categories = Category::all();
          $colors = Color::all();
          $sizes = Size::all();
          $maxPrice = Product::getMaxPrice();

          return view('productos.productos',[
              'products' => $products,
              'categories' => $categories,
              'colors' => $colors,
              'sizes' => $sizes,
              'sizeQuery' => $sizeQuery,
              'maxPrice' => $maxPrice
          ]);
    }
}
