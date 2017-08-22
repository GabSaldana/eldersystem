<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
/* Notifiable is used for allowing us to send notifications
to this user type through the Notifiable/Notifications api
Authenticatable on the other hand imports all the authentication
code that Laravel ships with,*/
    use Notifiable;
/*sets the guard that we will authenticate against.
This correlates with settings in config/auth.php
 The way it handles multiple user type authentication
 is a system called “guards”*/
    protected $guard = 'admin';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'email'
            ]
        ];
    }

    protected $table = "admins";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lastname','email','password','age','sex','specialty',
    'schedule','professional_id','telephone_number','office_address','photo','remember_token',
    'created_at','updated_at','deleted_at'];

    //Relaciones***********************************

    public function nodes(){

    	return $this->hasMany('App\Node')->withTimestamps();

    }

    public function users(){

    	return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function notifications(){

        return $this->hasMany('App\Notification')->withTimestamps();
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
