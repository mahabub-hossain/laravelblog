<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class admin extends Authenticatable
{
    use Notifiable;

    public  function roles(){
        return $this->belongsToMany('App\role','admin_role');
    }

    protected $fillable = [
        'name', 'email', 'password','phone','status'
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
