@extends('template.maintemp')

@section('title', $patient->name.' '.$patient->lastname)

@section('content')

<div class="row">
	<div class="col-md-2">

	</div>
	<div class="col-md-8 show ">
			<div class="form-group text-center">
				{{Html::image(asset($patient->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
			</div>
			<div class="form-group ">
				{!! Form::label('email','Correo Electronico: '.$patient->email) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('age','Edad: '.$patient->age) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('sex','Genero: '.$patient->sex) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('height','Estatura: '.$patient->height) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('weight','Peso: '.$patient->weight) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('telephone_number','Numero de Telefono: '.$patient->telephone_number) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('address','Direccion: '.$patient->address) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('short_description','Información médica: '.$patient->short_description) !!}
			</div>
			@if(Auth::guard('admin')->check())
				<h4 style="text-align:center">Mediciones</h4>
				<div id="areachart1" style="width:100%;margin:0 auto;"></div>
				<div id="areachart2" style="width:100%;margin:0 auto;"></div>

				@for($i=1; $i <= $count; $i++)
					<?=$lava->render('AreaChart','Medicion'.$i,'areachart'.$i);?>
				@endfor
			@endif
	</div>
	<div>
		@if(Auth::guard('admin')->check())
			<h4 style="text-align:center">Mediciones</h4>
			<div id="areachart1" style="width:100%;margin:0 auto;"></div>
			<div id="areachart2" style="width:100%;margin:0 auto;"></div>

			@for($i=1; $i <= $count; $i++)
				<?=$lava->render('AreaChart','Medicion'.$i,'areachart'.$i);?>
			@endfor
		@endif
	</div>

</div>
@endsection
