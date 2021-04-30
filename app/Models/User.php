<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\Billing_info;
use App\Models\Specification;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'email', 'password', 'user_type','phone','photo','status','dob','is_approved'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
        ->singleFile();
    }

    public function profile(){
        return $this->hasOne(Profile::class,'worker_id','id');
    }

    // Client Billing Info
    public function billing_info(){
        return $this->hasOne(Billing_info::class);
    }

    public function specification(){
        return $this->hasMany(Specification::class, 'creator_id','id');
    }
}
