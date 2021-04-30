<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_file_type extends Model
{
    protected $table = 'specific_file_types';

    protected $fillable = [
        'name',
        'price'
    ];

    public function specification()
    {
        return $this->belongsToMany(Specification::class, 'specific_file_rows', 'file_id', 'specification_id')->withPivot('file_id');
    }

}
