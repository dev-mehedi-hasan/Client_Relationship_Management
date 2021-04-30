<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Billing_info extends Model
{
    protected $table = 'billing_infos';

    protected $fillable = [
        'user_id',
        'company_name',
        'name',
        'email',
        'phone',
        'address_one',
        'address_two',
        'city',
        'postal_code',
        'vat_number',
        'country'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
