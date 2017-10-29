<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Measure;
use App\Node;
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
      //echo  $variables . '</br>';

      /*OBTENIEDNO EL ID DEL USUARIO ASIGNADO AL NODO*/
      $node =  DB::table('nodes')
            ->join('users', 'users.node_id', '=', 'nodes.id')
            ->where('nodes.mac_address','=',$macaddress)
            ->select('nodes.id as node', 'users.id as user','nodes.mac_address')
            ->get();
      //echo Node::searchnodeid($macaddress)->toSql();
      //dd($node);
      $node_id= $node[0]->node;
      $user_id= $node[0]->user;
      //dd($node_id );
      /*ALMCENANDO LAS VARIABLES EN LA BASE DE DATOS*/
      DB::insert('insert into measures(value,date,time,variable_id) values (?,?,?,?)',
      [$temperatura, $date, $time, 1]);
      DB::insert('insert into measures(value,date,time,variable_id) values (?,?,?,?)',
      [$pulso_cardiaco, $date, $time, 2]);
      $measures = DB::select( DB::raw("SELECT * FROM measures") );
      //dd($measures);

      /*COMPARANDO RANGOS DE TEMPERATURA*/
      if($temperatura <= 35.0 && $temperatura >= 33.0){
        //echo 'estas frio'. '</br>';
        DB::table('notifications')->insert(
          ['description' => $date.' '.$time.' Tu temperatura es de: '.$temperatura.' °C, esta por debajo de lo normal',
           'type' => 'POR DEBAJO',
           'user_id' => $user_id]
        );

      }elseif($temperatura >= 37.1 && $temperatura <= 38.0){
        //echo 'estas que ardes'. '</br>';
        DB::table('notifications')->insert(
          ['description' =>  $date.' '.$time.' Tu temperatura es de: '.$temperatura.' °C, esta por encima de lo normal',
           'type' => 'POR ENCIMA',
           'user_id' => $user_id]
        );
      }else{
        echo 'normal'. '</br>';
      }
      /*COMPARANDO RANGOS DE PULSO CARDIACO*/
      if($pulso_cardiaco >= 40.0 && $pulso_cardiaco <= 59.0 ){
        //echo 'estas frio'. '</br>';
        DB::table('notifications')->insert(
          ['description' =>  $date.' '.$time.' Tus pulsaciones por minuto son de: '.$pulso_cardiaco.' bpms, estan por debajo de lo normal',
           'type' => 'POR DEBAJO',
           'user_id' => $user_id]
        );

      }elseif($pulso_cardiaco <= 175 && $pulso_cardiaco >= 101){
        //echo 'estas que ardes'. '</br>';
        DB::table('notifications')->insert(
          ['description' =>  $date.' '.$time.' Tus pulsaciones por minuto son de: '.$pulso_cardiaco.' bpms, estan por encima de lo normal',
           'type' => 'POR ENCIMA',
           'user_id' => $user_id]
        );
      }else{
        echo 'normal'. '</br>';
      }

    }

}
