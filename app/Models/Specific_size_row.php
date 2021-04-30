<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_size_row extends Model
{
    protected $table = 'specific_size_rows';

    protected $fillable = [
        'specification_id',
        'size_id'
    ];

}
