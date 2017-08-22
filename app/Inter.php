<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Inter extends Model
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

  protected $table = "interfaces";

  protected $fillable = ['name','quantity','remember_token','deleted_at',
  'created_at', 'updated_at','node_id'];

  //Relaciones***********************************************

  public function node(){

    return $this->belongsTo('App\Node')->withTimestamps();
  }

  public function variables(){

    return $this->belongsToMany('App\Variable')->withTimestamps();
  }
}
