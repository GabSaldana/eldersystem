@extends('template.maintemp')

@section('title', 'Mediciones')

@section('content')

  <h3 style="text-align:center">Mediciones</h3>
<div class="row"><!--PRIMERA VARIABLE DE TEMPERATURA-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show">
      <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/331178/charts/1?bgcolor=%23ffffff&color=%23d62020&days=1&dynamic=true&results=5&title=Temperatura+corporal&type=line&xaxis=Hora&yaxis=Temperatura+%C2%B0C&yaxismax=40&yaxismin=20"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show" style=" background-color:#a3ccff;">
      <iframe width="459" height="257" style="border: 0px solid #fff; " src="https://thingspeak.com/channels/331178/maps/channel_show"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>
</div>

<div class="row"><!--PRIMERA VARIABLE DE TPULSO-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show">
     <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/338831/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Pulsos+por+minuto&type=bar&xaxis=Hora&yaxis=BPM"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show" style=" background-color:#a3ccff;">
      <iframe width="459" height="257" style="border: 0px solid #fff; " src="https://thingspeak.com/channels/331178/maps/channel_show"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>
</div>

@endsection
