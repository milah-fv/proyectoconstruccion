<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'id', 'title','code', 'published', 'enabled','type','value','percent_off', 'expiry_date', 'min_amount',
    ];

    public static function findByCode($code)
    {
    	return self::where('code', $code)->first();
    }

    public function discount($total)
    {
    	if ($this->type == 'fijo') {
    		return $this->value;
    	}
    	elseif ($this->type == 'porcentaje') {
    		return round(($this->percent_off / 100) * $total, 2);
    	}
    	else
    	{
    		return 0;
    	}
    }
}
