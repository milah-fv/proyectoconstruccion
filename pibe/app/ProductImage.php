<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // protected $guarded =[];
    
    protected $table = 'product_images';

    protected $fillable = [
        'id','image','product_id'
    ];

    public function product()
	{
		return $this->belongsTo(Product::class);

	}
}
