<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;
use Auth;

class Notification extends Model
{
  use Sluggable;
  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  //NOTA: Recuerden que 'slug' es el campo en la tabla y 'title' es el origen del campo
  public function sluggable()
  {
      return [
          'slug' => [
              'source' => 'description'
          ]
      ];
  }

protected $table = "notifications";
protected $fillable = ['description','type','admin_id','user_id','measure_id','remember_token','deleted_at','created_at', 'updated_at'];

//Relaciones****************************************

  public function admin(){
    return $this->belongsTo('App\Admin');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function measure(){
    return $this->belongsTo('App\Measure');
  }

  public function scopeSearchval($query, $value){
      return $query->where('users.name','like','%'.$value.'%')
      ->orWhere('notifications.type','like','%'.$value.'%')
      ->orWhere('notifications.description','like','%'.$value.'%')
      ->orderBy('notifications.id','DESC')
      ;
  }

  public function scopeSearchnotadmin($query, $id){
      return $query
      ->select('notifications.id','notifications.type','notifications.description','admin_user.user_id as user',
      'users.photo as photo','users.name as name','users.lastname as lastname')
      //from notifications
      ->join('admin_user', 'admin_user.user_id', '=', 'notifications.user_id')
      ->join('users', 'users.id', '=', 'notifications.user_id')
      ->where('admin_user.admin_id','=',$id)
      //->orderBy('notifications.id','DESC')
      ;
  }

  public function scopeSearchnotuser($query, $id){
      return $query
      ->select('notifications.id','notifications.type','notifications.description','users.id as user',
      'users.photo as photo','users.name as name','users.lastname as lastname')
      //from notifications
      ->join('users', 'users.id', '=', 'notifications.user_id')
      ->where('users.id','=',$id)
      //->orderBy('notifications.id','ASC')
      ;
  }

}
