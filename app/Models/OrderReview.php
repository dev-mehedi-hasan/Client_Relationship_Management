<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReview extends Model
{
    use HasFactory;

    protected $table = 'order_reviews';

    protected $guarded = ['id'];

   public function order(){
       return $this->hasOne(Order::class,'id','order_id');
   }

}
