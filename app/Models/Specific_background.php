<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_background extends Model
{
    protected $table = 'specific_backgrounds';

    protected $fillable = [
        'name',
        'price'
    ];

    public function specification()
    {
        return $this->belongsToMany(Specification::class, 'specific_background_rows', 'background_id', 'specification_id')->withPivot('background_id');
    }
}
