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

    public function comparisons(){
        return $this->hasMany('App\Models\Comparison');
    }

    public static function validate($data) {
        return Validator::make($data, [
            'email' => 'required|email|string|max:255|unique:users',
            'name' => 'required|max:500|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
