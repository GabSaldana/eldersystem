<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Variable extends Model
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
              'source' => 'name'
          ]
      ];
  }

  protected $table = "variables";
  protected $fillable = ['name','range',
'remember_token','deleted_at','created_at', 'updated_at'];

//Relaciones*********************************

  public function measures(){

    return $this->hasMany('App\Measure')->withTimestamps();
  }

  public function interfaces(){

    return $this->belongsToMany('App\Inter')->withTimestamps();
  }

  public function users(){

    return $this->belongsToMany('App\User')->withTimestamps();
  }
}
