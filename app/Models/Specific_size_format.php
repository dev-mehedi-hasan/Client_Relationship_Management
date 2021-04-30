<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_size_format extends Model
{
    protected $table = 'specific_size_formats';

    protected $fillable = [
        'name',
        'price'
    ];

    public function specification()
    {
        return $this->belongsToMany(Specification::class, 'specific_size_rows', 'size_id', 'specification_id')->withPivot('size_id');
    }

}
