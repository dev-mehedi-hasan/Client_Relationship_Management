<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $table = 'specifications';

    protected $fillable = [
        'specific_id',
        'creator_id',
        'category_id',
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'creator_id','id');
    }

    public function category(){
        return $this->hasOne(Specific_category::class, 'id','category_id');
    }

    // Alignment Relation
    public function alignment()
    {
        return $this->belongsToMany(Specific_alignment::class, 'specific_align_rows','specification_id', 'align_id')->withPivot('specification_id');
    }

    // File-Type Relation
    public function file_type()
    {
        return $this->belongsToMany(Specific_file_type::class, 'specific_file_rows','specification_id', 'file_id')->withPivot('specification_id');
    }

     // Background Relation
     public function background()
     {
         return $this->belongsToMany(Specific_background::class, 'specific_background_rows','specification_id', 'background_id')->withPivot('specification_id');
     }

     // Color Relation
     public function color()
     {
         return $this->belongsToMany(Specific_color::class, 'specific_color_rows','specification_id', 'color_id')->withPivot('specification_id');
     }

      // Margin Relation
      public function margin()
      {
          return $this->hasMany(Specific_margin_row::class,'specification_id','id');
      }

     // DPI Relation
     public function dpi()
     {
         return $this->belongsToMany(Specific_dpi::class, 'specific_dpi_rows','specification_id', 'dpi_id')->withPivot('specification_id');
     }

     // Addon Relation
     public function addon()
     {
         return $this->belongsToMany(Specific_addon::class, 'specific_addon_rows','specification_id', 'addon_id')->withPivot('specification_id');
     }

     // Size Relation
     public function size()
     {
         return $this->belongsToMany(Specific_size_format::class, 'specific_size_rows','specification_id', 'size_id')->withPivot('specification_id');
     }

    //  Custom Size
    public function custom_size(){
        return $this->hasOne(Size_format_custom_row::class,'specification_id', 'id');
    }

    // Order 
    public function order(){
        return $this->belongsToMany(Order::class,'spacification_id', 'id');
    }

}



