<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerVerify extends Model
{
   	protected $table = 'customer_verify';
 	
 	 protected $fillable = [
        'customer_id','token'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
