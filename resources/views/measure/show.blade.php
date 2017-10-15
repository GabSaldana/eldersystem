@extends('template.maintemp')

@section('title', 'Mediciones')

@section('content')
<div class= " show colortitle" style="padding:10px;">
  <h3 style="text-align:center;font-size:25px; ">Mediciones</h3>
</div>
</br>
<div class="row"><!--PRIMERA VARIABLE DE TEMPERATURA-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show" >
      <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/331178/charts/1?bgcolor=%23ffffff&color=%23d62020&days=1&dynamic=true&results=40&title=Temperatura+corporal&type=line&xaxis=Hora&yaxis=Temperatura+%C2%B0C&yaxismax=40&yaxismin=20"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>
<div class="row"><!--PRIMERA VARIABLE DE TEMPERATURA PROMEDIO-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show">
     <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/331178/charts/1?average=15&bgcolor=%23ffffff&color=%23d62020&days=1&dynamic=true&title=Temperatura+corporal+promedio+al+d%C3%ADa&type=bar&xaxis=Hora&yaxis=Temperatura+%C2%B0C&yaxismax=40&yaxismin=20"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>

<div class="row"><!--PRIMERA VARIABLE DE PULSO-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show">
     <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/338831/charts/1?bgcolor=%23ffffff&color=%23d62020&days=1&dynamic=true&results=20&title=Pulsos+por+minuto&type=bar&xaxis=Hora&yaxis=BPM"></iframe>
    </div>
    <div class="col-md-3"></div>
  </div>
</br>

<div class="row"><!--PRIMERA VARIABLE DE PULSO PROMEDIO-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 show" >
      <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/338831/charts/1?average=20&bgcolor=%23ffffff&color=%23d62020&days=1&dynamic=true&title=Promedio+de+pulsos+por+minuto+al+d%C3%ADa&type=bar&xaxis=Hora&yaxis=BPM"></iframe>
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
@section('js')
  <script>
	/*ROJO, AZUL VERDE, NARANJA, MORADO*/
	var colors2 = ['#F44336', '#0091EA', '#3F51B5', '#9C27B0', '#43A047', '#F57C00'];
	$('.colortitle').css('color','#FFFFFF');
	$('.colortitle').css('background-color', colors2[Math.floor(Math.random() * colors2.length)]);

  </script>
@endsection
