<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\OrderNotification;
use Illuminate\Notifications\Notifiable;
use DB;

use Jenssegers\Date\Date;

class Order extends Model
{
	use Notifiable;

    protected $table = 'orders';

    protected $fillable = ['id', 'customer_id',  'name', 'last_name', 'document_id', 'dni', 'state_id'];

    public function customer()
    {
      	return $this->belongsTo(Customer::class);  
	}

	public function payment()
	{
	  	return $this->hasOne(Payment::class);
	}

	public function invoice()
	{
	  	return $this->hasOne(Invoice::class);
	}

	public function shipping()
	{
	  	return $this->hasOne(Shipping::class);
	}

    public function products()
    {
      	return $this->belongsToMany(Product::class,'order_details')->withTimestamps()->withPivot(['quantity','size']);
    }

    public function getIdFormat()
    {
		$parameter =[
            'id' => $this->attributes['id'],
        ];
		$parameter= Crypt::encrypt($parameter);
	
     	return $parameter;
    }
    
    public function getTotalPrice() 
    {
		return $this->products->sum(function($product) 
		{
			return $product->pivot->quantity * $product->price;
		});
    }

    public function state()
    {
      	return $this->belongsTo(State::class);
	}
	
    public function getColorState()
    {
		switch ($this->attributes['state_id'] ) 
		{
			case 1:
				return 'cancel';
				break;
			case 2:
				return 'completed';
				break;
			case 3:
				return 'delayed';
				break;
			case 4:
				return 'closed';
				break;
			case 7:
				return 'completed';
				break;
			default:
				echo "delayed";
		}

	}
	
	public function messages()
    {
      	return $this->hasMany(Message::class);
	}

	public function bouchers()
    {
      	return $this->hasOne(Boucher::class);
	}
	
	public function sendOrderNotification($order)
    {
        $this->notify(new OrderNotification($order));
    }
	
	public function getCreatedAtAttribute($date)
	{
		return new Date($date);
	}

	public static function topCustomer($f1,$f2)
	{
		return DB::table('orders')
		->join('customers', 'customers.id', '=', 'orders.customer_id')
		->select('customers.name','customers.last_name','customers.email',DB::raw('count(customer_id) as purchases'))
		->where('state_id','=','7')
		->whereBetween('orders.created_at', [$f1,  $f2])		
		->groupBy('customer_id','customers.name','customers.last_name','customers.email')
		->orderBy(DB::raw('count(customer_id)'), 'desc')		
		->get();
	}

	public static function purchases($f1,$f2)
	{
		return DB::table('orders')
		->join('customers', 'customers.id', '=', 'orders.customer_id')
		->join('payments', 'payments.order_id', '=', 'orders.id')
		->join('payment_types', 'payments.payment_type_id', '=', 'payment_types.id')						
		->select('customers.name','customers.last_name','orders.id','orders.created_at','payments.amount','payment_types.name as method')
		->where('state_id','=','7')
		->whereBetween('orders.created_at', [$f1,  $f2])		
		->get();
	}
}
