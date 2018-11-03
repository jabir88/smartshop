<?php

namespace App;

use Illuminate\Notifications\Notifiable;

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
        'name', 'email', 'password','token','provider','provider_id','email_verified','email_verified_at','address' ,'email_verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // public function verified()
    // {
    //   return $this->token === null;
    // }
    public function RoleName()
    {
        return $this->belongsTO('App\Userrole', 'role_id', 'role_id');
    }
}
