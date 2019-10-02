<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'contact','email', 'password', 'userRole_id',
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

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function vendor(){
        return $this->hasOne(Vendor::class);
    }

    public function userRole(){
        return $this->belongsTo(UserRole::class);
    }

    public function orderrequest(){
        return $this->hasMany(OrderRequest::class);
    }

    public function quotation(){
        return $this->hasMany(Quotation::class);
    }

    public function ratingnfeedback(){
        return $this->hasMany(RatingNFeedback::class);
    }
}
