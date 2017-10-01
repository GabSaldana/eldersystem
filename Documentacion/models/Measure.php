<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Measure extends Model
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
              'source' => 'value'
          ]
      ];
  }

  protected $table = "measures";
protected $fillable = ['value','date','time','variable_id',
'remember_token','deleted_at','created_at', 'updated_at'];

//Relaciones******************************************

public function notifications(){

      return $this->hasMany('App\Notification')->withTimestamps();
  }

  public function variable(){

    return $this->belongsTo('App\Variable')->withTimestamps();
  }
}
