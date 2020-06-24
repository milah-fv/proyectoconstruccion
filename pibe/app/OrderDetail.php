<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

  	protected $fillable = [
        'id','product_id', 'order_id', 'quantity', 'size'
  	];
}
