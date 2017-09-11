
@extends('template.register')

@section('content')
	{!! Form::open(['route' => 'doctor.store', 'method' => 'POST','files' => true]) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre(s)', 'required']) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('lastname','Apellidos') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								{!! Form::text('lastname',null,['class' => 'form-control', 'required']) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::email('email',null,['class' => 'form-control','placeholder' => 'ejemplo@algo.com (no usar ñ)', 'required']) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								{!! Form::password('password',['class' => 'form-control','placeholder' => '*******', 'required']) !!}
					</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('age','Edad') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								{!! Form::number('age',null,['class' => 'form-control', 'required']) !!}
					</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('sex','Genero') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::select('sex', [ 'M' => 'Masculino', 'F' => 'Femenino'],null ,['class' => 'form-control',
			'placeholder' => 'Seleccione una opción...','required']) !!}
				 </div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('specialty','Especialidad') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::text('specialty',null,['class' => 'form-control', 'required']) !!}
					</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('schedule','Horario') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::text('schedule',null,['class' => 'form-control', 'placeholder' => '(días hora) Ejemplo: L,M,M,J,V 9-13', 'required']) !!}
				  </div>
				</div>
		</div>
		<div class="form-group">
			{!! Form::label('professional_id','Cédula') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::text('professional_id',null,['class' => 'form-control', 'required']) !!}
					</div>
				</div>
		</div>
    <div class="form-group">
			{!! Form::label('telephone_number','Numero de Telefono') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::tel('telephone_number',null,['class' => 'form-control', 'required']) !!}
					</div>
				</div>
		</div>
		<div class="form-group">
			{!! Form::label('office_address','Direccion') !!}
			<div class="cols-sm-10">
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			{!! Form::text('office_address',null,['class' => 'form-control']) !!}
					</div>
				</div>
		</div>
		<div class="form-group">
    		{!! Form::label('photo', 'Foto') !!}
				<div class="cols-sm-10">
						<div class="input-group">
								<label class="btn btn-success btn-md">
    							Subir foto <input id ="photo" name="photo" type="file" style="display: none;">
								</label>
						</div>
				</div>
  	</div>

		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary btn-lg btn-block login-button']) !!}
		</div>

	{!! Form::close() !!}
@endsection
