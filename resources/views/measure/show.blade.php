@extends('template.maintemp')

@section('title', 'Mediciones')

@section('content')

  <h4 style="text-align:center">Mediciones</h4>
  <div id="areachart" style="width:100%;margin:0 auto;"></div>
  <div id="areachart2" style="width:100%;margin:0 auto;"></div>
  <?=$lava->render("AreaChart","Medicion","areachart");?>
  <?=$lava->render("AreaChart","Medicion2","areachart2");?>

@endsection
