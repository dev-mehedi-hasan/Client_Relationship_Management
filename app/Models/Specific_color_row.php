<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_color_row extends Model
{
    protected $table = 'specific_color_rows';

    protected $fillable = [
        'specification_id',
        'color_id'
    ];
}
