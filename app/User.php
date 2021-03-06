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
    public function node(){

      return $this->belongsTo('App\Node')->withTimestamps();
    }

    public function admins(){

    	return $this->belongsToMany('App\Admin')->withTimestamps();
    }

    public function notifications(){

        return $this->hasMany('App\Notification')->withTimestamps();
    }

    public function variables(){

    	return $this->belongsToMany('App\Variable')->withTimestamps();
    }

    public function scopeSearch($query,$name){
        //$name = 'X';
        return $query->where('users.name','like','%'.$name.'%')->orderBy('users.id','ASC');
    }

    public function scopeSearchuser($query,$id){//seleccionar los pacientes del doctor

      //$name = 'X';
      //$id  = strtok($argument, '/');
      //$name = strtok('/');
      return $query
      ->select('users.*','admins.id as doctor_id','admins.name as doctor_name')
      //from users
      ->join('admin_user', 'admin_user.user_id', '=', 'users.id')
      ->join('admins', 'admins.id', '=', 'admin_user.admin_id')
      ->where('admin_user.admin_id','=',$id)
      //->where('users.name','like','%'.$name.'%')
      //->orderBy('users.id','ASC')
      ;
    }

    public function scopeUsernode($query,$id){

      return $query
      ->select('users.*')
      ->where('users.node_id','=',$id)
      ->orderBy('users.id','ASC')
      ;
    }

    public function scopeUser($query,$id){

      return $query
      ->select('users.*')
      ->where('users.id','=',$id)
      ->orderBy('users.id','ASC')
      ;
    }

    public function scopeUsernodo($query,$id){

      return $query
      ->select('users.*','users.node_id')
      ->select('name','id')
      //from users
      ->where('node_id','=',$id)
      ->orderBy('id','ASC')
      ;
    }

    public function scopeSearchmeasure($query,$id){

      return $query
      ->select('measures.value','measures.time')
      ->join('admin_user', 'admin_user.user_id', '=', 'users.id')
      ->join('variables', 'variables.id', '=', 'admin_user.variable_id')
      ->join('measures', 'measures.variable_id', '=', 'variables.id')
      ->where('users.id','=',$id)
      ->orderBy('users.id','ASC')
      ;

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
