<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size_format_custom_row extends Model
{

    protected $table = 'size_format_custom_rows';

    protected $fillable = [
        'specification_id',
        'size_id',
        'value_1',
        'value_2'
    ];

}
