<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'is_active', 'name', 'email', 'password', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function setPasswordAttribute($password){
        if(!empty($password)){

            //hash with bcrypt
            //$this->attributes['password'] = bcrypt($password);

            //$this->attributes['password'] = Hash::make($password);

            $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
        }
    }

    public function isAdmin(){

        if(!empty($this->role->name)) {
            if ($this->role->name == "Administrator" && $this->is_active == 1){
                return true;
            }
            return false;
        }

    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
