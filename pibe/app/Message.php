<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Message extends Model
{
    protected $guarded =[];

    public function order()
    {
      return $this->belongsTo(Order::class);
  
	}

	public function user()
    {
      return $this->belongsTo(User::class);
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
