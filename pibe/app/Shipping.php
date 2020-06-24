<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = ['order_id', 'departament',  'province', 'address', 'referenceAddress', 'price'];

    protected $primaryKey = 'order_id';

}
