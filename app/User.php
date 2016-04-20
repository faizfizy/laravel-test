<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function carts() {
        return $this->hasMany('App\Cart');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function notifications() {
        return $this->hasMany('App\Notification');
    }

    public function messages_from() {
        return $this->belongsToMany('App\User', 'messages', 'from', 'to')->withPivot('message');
    }

    public function messages_to() {
        return $this->belongsToMany('App\User', 'messages', 'to', 'from')->withPivot('message');
    }

}
