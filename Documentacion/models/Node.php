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

  public function interfaces(){

    return $this->hasMany('App\Inter')->withTimestamps();
  }

  public function admin(){

    return $this->belongsTo('App\Admin')->withTimestamps();
  }
  public function scopeSearch($query, $type){

      return $query->where('mac_address','like','%'.$type.'%');
  }
}
