<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_image extends Model
{
    protected $table = 'order_images';

    protected $fillable =[
        'order_id',
        'image'
    ];
}
