<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryImage extends Model
{
    protected $table = 'delivery_image';

    protected $fillable = [
        'order_id',
        'delivery_image',
        'delivery_date'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }
}
