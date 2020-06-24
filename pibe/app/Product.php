<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use  Illuminate\Support\Collection as Collection;

class Product extends Model
{
    // protected $guarded =[];

    protected $table = 'products';

    protected $fillable = [
        'id','name', 'price', 'old_price', 'cover_image', 'stock', 'description', 'features', 'state', 'category_id', 'color_id'
    ];

	public function images()
	{
		return $this->hasMany(ProductImage::class);

	}

	public function color()
	{
		return $this->belongsTo(Color::class);

	}

	public function orders()
    {
      	return $this->belongsToMany(Order::class, 'order_details')->withTimestamps();
	}

	public function category()
	{
		return $this->belongsTo(Category::class);

	}

	public function sizes()
	{
		return $this->belongsToMany(Size::class)->withTimestamps()->withPivot('quantity');
	}

	public function getCoverImageAttribute()
	{
		if (!$this->attributes['cover_image']) 
		{
			return '/img_product/default-product.png';
		}

		return ($this->attributes['cover_image']);
	}

	public function getState()
	{
		if($this->attributes['state'] == "Nuevo")
		{
			return "new-product";
		}
		else if($this->attributes['state'] == "Oferta")
		{
			return "on-sale";
		}
		else
		{
			return "";
		}
	}
	
	public static function getMaxPrice()
	{
		return Product::max('price');
	}

	public function scopeName($query, $name)
	{
		if($name)
			return $query->where('name','LIKE',"%$name%");
	}

	public function scopePrice($query, $min_price,$max_price)
	{
		if($min_price && $max_price)
			return $query->where('price','>=',$min_price)
						->where('price','<=',$max_price);
	}

	public static function topProduct($top)
	{
		$products =  DB::table('order_details')
		->join('products', 'order_details.product_id', '=', 'products.id')
		->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('product_id','products.name','products.description', DB::raw('sum(quantity) as TotalQuantity'))
		->groupBy('product_id','products.name','products.description')
		->where('products.stock','>',0)
		->orderBy(DB::raw('sum(quantity)'), 'desc')
		->take($top)
		->get();

		$popular= [];
		foreach( $products as $product)
		{
			array_push($popular,Product::find($product->product_id));
		}
		$collection = Collection::make($popular);
		return $collection;

	}

	public static function top10Product($f1,$f2)
	{
		$products =  DB::table('order_details')
		->join('products', 'order_details.product_id', '=', 'products.id')
		->join('orders', 'order_details.order_id', '=', 'orders.id')
		->select('products.id', DB::raw('sum(quantity) as TotalQuantity') )
		->whereBetween('orders.created_at', [$f1,  $f2])
		->where('orders.state_id','=','7')
		->groupBy('products.id')
		->orderBy(DB::raw('sum(quantity)'), 'desc')
		->take(10)
		->get();

		$popular= [];
		foreach( $products as $key=>$product)
		{
			$key++;
			$productFind = Product::find($product->id);
			$productFind->qty = $product->TotalQuantity;
			$productFind->top = $key;
			$productFind->price = "S/. $productFind->price";	
			$productFind->category;													
															
			array_push($popular,$productFind);
		}
		$collection = Collection::make($popular);
		return $collection;
	}

	public static function miniumStockProducts()
	{
		$products =  DB::table('products')
		// ->join('products', 'product_size.product_id', '=', 'products.id')
		->select('products.id', 'products.name','products.price', 'products.stock')
		->where('products.stock', '<', 3)
		// ->groupBy('products.id')
		->orderBy('products.stock', 'desc')
		->take(10)
		->get();

		$popular= [];
		foreach( $products as $key=>$product)
		{	
			$key++;
			$productFind = Product::find($product->id);
			$productFind->top = $key;
			$productFind->category;	
			array_push($popular,$productFind);
		}
		$collection = Collection::make($popular);
		return $collection;
		
	}
}
