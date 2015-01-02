@extends('layouts.base_admin')
@section('title')
Agregar <small> CURSO DE CARRERA </small>
@stop
@section('options')
<li>{{HTML::link('CursosTecnica/index.html','Listar')}}</li>
<li>{{HTML::link('CursosTecnica/create.html','Nuevo')}}</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12">


{{ Form::open(array('method'=> 'POST','url'=> 'CursosTecnica/insert.html','class'=>'form-horizontal','role'=>'form')) }}

	
	<div class="form-group">
		{{ Form::label('id','Codigo del Curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('id','',array('class'=>'form-control','placeholder'=>'isc-01'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('id'))
		       	@foreach ($errors->get('id') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre del Curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Programacion en Android'))}}
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
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			@if($modulo == null)
				{{HTML::linkAction('ModuloController@create', 'Necesita agregar modulo','',array('class'=>'btn btn-warning'))}}
			@else
				{{ Form::select('modulo',$modulo,null,array('class'=>'form-control','required'))}}
				<br>
				{{HTML::linkAction('ModuloController@create', 'Nuevo Modulo','',array('class'=>'btn btn-success'))}}
			@endif
		</div>
		<div class="errores">
			@if ( $errors->has('modulo'))
		       	@foreach ($errors->get('modulo') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::number('horas_academicas','',array('class'=>'form-control','placeholder'=>'30 horas academicas'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('horas_academicas'))
		       	@foreach ($errors->get('horas_academicas') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('codCarrera','Carrera:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			@if($carrera == null)
				{{HTML::linkAction('CarreraProfesionalController@add', 'Necesita agregar carrera','',array('class'=>'btn btn-warning','required'))}}
			@else
			{{ Form::select('codCarrera',$carrera,null,array('class'=>'form-control','required'))}}
			<br>
			{{HTML::linkAction('CarreraProfesionalController@add', 'Nueva Carrera','',array('class'=>'btn btn-success'))}}
			
			@endif
			
		</div>
		<div class="errores">
			@if ( $errors->has('codCarrera'))
		       	@foreach ($errors->get('codCarrera') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
		
	</div>

	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			{{HTML::linkAction('CursosCarreraTecnicaController@listar', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}

		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
