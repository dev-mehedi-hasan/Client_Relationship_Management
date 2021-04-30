<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_category_row extends Model
{
    protected $table = 'specific_file_rows';

    protected $fillable = [
        'specification_id',
        'category_id'
    ];
}
