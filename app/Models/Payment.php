<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'order_id',
        'card_number',
        'month',
        'year',
        'cvv',
        'payable',
        'paid_amount',
        'payment_method'
    ];
}
