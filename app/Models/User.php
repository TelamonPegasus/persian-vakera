<?php

namespace App\Models;

// use Illuminate\Contracts\auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mobile_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getStatusAttribute()
    {
        if ( $this->attributes['status'] == 3 ) {
            return ['label' => 'عدم تایید', 'bs_class' => 'badge bg-danger', 'status' => 3];
        }
        if ( $this->attributes['status'] == 2 ) {
            return ['label' => 'تایید شده', 'bs_class' => 'badge bg-success', 'status' => 2];
        }
        if ( $this->attributes['status'] == 1 ) {
            return ['label' => 'در انتظار تایید', 'bs_class' => 'badge bg-info', 'status' => 1];
        }
        return ['label' => 'در حال انجام', 'bs_class' => 'badge bg-warning', 'status' => 0];
    }

    public function getFullNameAttribute()
    {
        return $this->first_name .' ' . $this->last_name;
    }

    public function isAdmin()
    {
        return $this->level == 'admin' ? true : false;
    }
}
