<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
protected $fillable = ['description','type','admin_id','user_id','measure_id',
'remember_token','deleted_at','created_at', 'updated_at'];

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

  public function scopeSearch($query, $type){
      return $query->where('type','like','%'.$type.'%');
  }
}
