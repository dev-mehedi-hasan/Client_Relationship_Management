<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_addon_row extends Model
{
    protected $table = 'specific_addon_rows';

    protected $fillable = [
        'specification_id',
        'addon_id'
    ];
}
