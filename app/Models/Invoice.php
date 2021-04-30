<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoice';

    protected $fillable = [
        'invoice_id',
        'order_id',
        'payment_id',
        'invoice_date',
        'worker_id',
        'client_id',
        'status'
    ];

    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }

    public function payment(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }


}
