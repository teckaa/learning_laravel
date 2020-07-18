<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
        'invoice_no',
        'invoice_content',
        'invoice_total_balance',
        'invoice_date',
        'invoice_time',
        'customer',
        'created_datetime',
        'created_date',
        'created_time',
        'user_id'
    ];

    public function getInvoiceTotalBalanceAttribute($name)
    {
        return number_format($name, 2);
    }

}
