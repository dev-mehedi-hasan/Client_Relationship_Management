<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_margin_row extends Model
{
    protected $table = 'specific_margin_rows';

    protected $fillable = [
        'specification_id',
        'margin'
    ];

}
