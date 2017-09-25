<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Node extends Model
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
              'source' => 'mac_address'
          ]
      ];
  }

  protected $table = "nodes";

  protected $fillable = ['mac_address','remember_token','deleted_at','created_at',
  'updated_at','admin_id'];

  //Relaciones**********************************

  public function users(){

    return $this->hasMany('App\User')->withTimestamps();
  }

  public function interfaces(){

    return $this->hasMany('App\Inter')->withTimestamps();
  }

  public function admin(){

    return $this->belongsTo('App\Admin')->withTimestamps();
  }
  public function scopeSearch($query, $type){

      return $query->where('mac_address','like','%'.$type.'%');
  }
  public function scopeSearchnode($query, $id){//seleccionar los pacientes del doctor

    return $query
    ->select('nodes.*','admins.id as doctor_id')
    ->join('admins', 'admins.id', '=', 'nodes.admin_id')
    ->where('admins.id','=',$id)
    ->orderBy('nodes.id','ASC')
    ;

  }
  public function scopeSearchvariable($query, $id){//seleccionar las variables del nodo ocupadas
    return $query
    ->select('users.name as user','variables.name as variable','variables.id as idvar','users.id as idusr')
    //tabl aara mostrar variable y usuario solo de ese nodo
    ->join('users', 'users.node_id', '=', 'nodes.id')
    ->join('user_variable', 'user_variable.user_id', '=', 'users.id')
    ->join('variables', 'variables.id', '=', 'user_variable.variable_id')
    //falto patient_varible con variable id
    ->where('nodes.id','=',$id)
    ->orderBy('variables.id','ASC')
    ;
  }

  public function scopeSearchnodeid($query, $macaddress){
      return $query
      ->select('nodes.id as node','users.id as user')
      //from nodes
      ->join('users', 'users.node_id', '=', 'nodes.id')
      ->where('nodes.mac_address','=',$macaddress)
      //->orderBy('notifications.id','ASC')
      ;
  }
}
