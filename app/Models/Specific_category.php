<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_category extends Model
{
    protected $table = 'specific_categories';

    protected $fillable = [
        'title',
        'image'
    ];
}
