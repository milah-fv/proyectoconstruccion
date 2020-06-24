<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = ['order_id', 'payment_type_id',  'amount','reference_code'];

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

}
