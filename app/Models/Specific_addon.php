<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_addon extends Model
{
    protected $table = 'specific_addons';

    protected $fillable = [
        'name',
        'price'
    ];
}
