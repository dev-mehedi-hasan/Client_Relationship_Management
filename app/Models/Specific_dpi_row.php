<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_dpi_row extends Model
{
    protected $table = 'specific_dpi_rows';

    protected $fillable = [
        'specification_id',
        'dpi_id'
    ];
}
