@extends('layouts.base_admin')
@section('title')
Editar Alumno <small> {{$alumno->nombre}} </small>
@stop
@section('options')
<li><a href="#">Editar</a></li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::model($alumno,array('url'=>array('alumno/update',$alumno->id),'method'=> 'POST','class'=>'form-horizontal','role'=>'form'))}}
	<div class="form-group">
		{{ Form::label('nombre','Nombre(s):',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre',$alumno->nombre,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('nombre'))
		       	@foreach ($errors->get('nombre') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('apellidos','Apellidos:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('apellidos',$alumno->apellidos,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('apellidos'))
		       	@foreach ($errors->get('apellidos') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('dni','DNI:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('dni',$alumno->dni,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('dni'))
		       	@foreach ($errors->get('dni') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('direccion','Dirección:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('direccion',$alumno->direccion,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('direccion'))
		       	@foreach ($errors->get('direccion') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('telefono','Teléfono:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('telefono',$alumno->telefono,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('telefono'))
		       	@foreach ($errors->get('telefono') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email','E-mail:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::email('email',$alumno->email,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('email'))
		       	@foreach ($errors->get('email') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codCarrera','Carrera Profesional:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::select('codCarrera',$carreras,null,array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('codCarrera'))
		       	@foreach ($errors->get('codCarrera') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<!--div class="form-group">
		{{ Form::label('password','Password:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::password('password',array('class'=>'form-control'))}}
		</div>
	</div-->
	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop