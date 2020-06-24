<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boucher extends Model
{
    // protected $guarded =[];
    
    protected $table = 'bouchers';

    protected $fillable = [
        'id','order_id', 'customer_id', 'image',
    ];

	public function order()
    {
      return $this->belongsTo(Order::class);
  
	}
	public function customer()
    {
      return $this->belongsTo(Customer::class);
    }

    public function formatDate()
	{
		$date = $this->created_at->format('d F \,\ Y \a\ \\l\\a\\s h:i:a');
		return $date;
  	}

  public function getCreatedAtAttribute($date)
	{
		return new Date($date);
	}
}
