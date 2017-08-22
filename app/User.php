<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'email'
            ]
        ];
    }

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lastname','email','password','age','sex','height','weight',
    'telephone_number', 'address', 'short_description','photo','remember_token','deleted_at',
    'created_at', 'updated_at'];

    //Relaciones*****************************************

    public function admins(){

    	return $this->belongsToMany('App\Admin')->withTimestamps();
    }

    public function notifications(){

        return $this->hasMany('App\Notification')->withTimestamps();
    }

    public function variables(){

    	return $this->belongsToMany('App\Variable')->withTimestamps();
    }

    public function scopeSearch($query, $name){

        return $query->where('name','like','%'.$name.'%');
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
