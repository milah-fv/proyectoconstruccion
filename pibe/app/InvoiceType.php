<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceType extends Model
{
    protected $table = 'invoices_types';

    protected $fillable = ['id', 'name'];

    public function payments()
    {
        return $this->hasMany(Invoice::class);
    }
}
