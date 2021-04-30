<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'worker_id',
        'address_one',
        'address_two',
        'postal_code',
        'country',
        'city'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','worker_id');
    }

}
