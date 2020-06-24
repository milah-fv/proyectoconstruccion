<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  // protected $guarded =[];
    
  protected $table = 'sizes';

  protected $fillable = [
        'id','name'
  ];
  
  public function products()
  {
    return $this->belongsToMany(Product::class)->withTimestamps();

  }
  public function scopeSearchSize($query,$name) 
  {
    return $query->where('name' ,'=', $name);
  }
}
