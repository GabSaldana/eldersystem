<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Measure;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Auth;


class MeasureController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd('ji');
      $macaddress = $request->node;
      $temperatura = $request->temp;
      $pulso_cardiaco = $request->pulso;
      date_default_timezone_set("America/Mexico_City");
      $date = date("Y/m/d");
      $time = date("h:i:s");
      $variables = 'nodo:' . $macaddress. ' temperatura:' . $temperatura . ' pulso cardiaco:' . $pulso_cardiaco ;
      echo  $variables . '</br>';

      /*OBTENIEDNO EL ID DEL USUARIO ASIGNADO AL NODO*/
      
      /*ALMCENANDO LAS VARIABLES EN LA BASE DE DATOS*/
      /*DB::insert('insert into measures(value,date,time,variable_id) values (?,?,?,?)',
      [$temperatura, $date, $time, 1]);
      DB::insert('insert into measures(value,date,time,variable_id) values (?,?,?,?)',
      [$pulso_cardiaco, $date, $time, 2]);
      $measures = DB::select( DB::raw("SELECT * FROM measures") );*/
      //dd($measures);

      if($temperatura < 35 ){
        echo 'estas frio'. '</br>';

      }elseif($temperatura > 38){
        echo 'estas que ardes'. '</br>';
      }else{
        echo 'normal'. '</br>';
      }

    }

}
