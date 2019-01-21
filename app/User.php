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
        'name', 'email', 'password', 'first_name', 'last_name', 'birthday', 'address', 'gender','provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }

    public function albums()
    {
        return $this->hasMany('\App\Album');
    }

    public function journals() 
    {
        return $this->hasMany('\App\Journal');
    }

    public function getFullNameAtrribute()
    {
        return $this->getAttribute('first_name') .' ' . $this->getAttribute('last_name');   
    }
}
