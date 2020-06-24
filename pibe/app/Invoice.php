<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['order_id', 'invoice_type_id',  'number'];

    public function invoiceType()
    {
        return $this->belongsTo(InvoiceType::class);
    }

}
