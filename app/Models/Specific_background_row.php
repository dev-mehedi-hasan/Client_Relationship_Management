<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_background_row extends Model
{
    protected $table = 'specific_background_rows';

    protected $fillable = [
        'specification_id',
        'background_id'
    ];
}
