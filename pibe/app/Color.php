<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    // protected $guarded =[];

    protected $table = 'colors';

    protected $fillable = [
        'id','color'
    ];

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function scopeSearchColor($query,$id) 
	{
		return $query->where('id' ,'=', $id);
	}
}
