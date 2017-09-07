@extends('template.maintemp')

@section('title', 'Mediciones')

@section('content')

  <h4 style="text-align:center">Mediciones</h4>
  <div class="show">
      <div id="areachart1" style="width:100%;margin:0 auto;"></div>
  </div>
</br>
  <div class="show">
    <div id="areachart2" style="width:100%;margin:0 auto;"></div>
  </div>

@for($i=1; $i <= $count; $i++)
  <?=$lava->render('AreaChart','Medicion'.$i,'areachart'.$i);?>
@endfor


@endsection
