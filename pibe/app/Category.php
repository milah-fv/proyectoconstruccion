<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $guarded =[];
    
    protected $table = 'categories';

    protected $fillable = [
        'id','name', 'slug'
    ];

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function scopeSearchCategory($query,$slug) 
	{
		return $query->where('slug' ,'=', $slug);
	}
}
