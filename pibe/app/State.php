<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $table = 'states';

    protected $fillable = ['id', 'name'];
	
    public function orders()
    {
      return $this->hasMany(Order::class);
  
    }
}
