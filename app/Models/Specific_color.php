<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_color extends Model
{
    protected $table = 'specific_colors';

    protected $fillable = [
        'name',
        'price'
    ];

    public function specification()
    {
        return $this->belongsToMany(Specification::class, 'specific_color_rows', 'color_id', 'specification_id')->withPivot('color_id');
    }
}
