<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_dpi extends Model
{
    protected $table = 'specific_dpis';

    protected $fillable = [
        'name',
        'price'
    ];

    public function specification()
    {
        return $this->belongsToMany(Specification::class, 'specific_dpi_rows', 'dpi_id', 'specification_id')->withPivot('dpi_id');
    }

}
