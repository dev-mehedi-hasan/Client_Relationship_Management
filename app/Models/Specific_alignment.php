<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specific_alignment extends Model
{
    protected $table = 'specific_alignments';

    protected $fillable = [
        'name',
        'price'
    ];

    public function specification()
    {
        return $this->belongsToMany(Specification::class, 'specific_align_rows', 'align_id', 'specification_id')->withPivot('align_id');
    }
}
