@extends('layouts.base_admin')
@section('title')
Agregar Carrera <small> NUEVA CARRERA PROFESIONAL </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('CarreraProfesional','CARRERA PROFESIONAL')}} </li>	
<li>Agregar Carrera Profesional</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'CarreraProfesional/insert.html','class'=>'form-horizontal','role'=>'form')) }}

	<div class="form-group">
		{{ Form::label('nombre','Nombre:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Informatica'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('nombre'))
		       	@foreach ($errors->get('nombre') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group ">
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('descripcion','',array('class'=>'form-control','placeholder'=>'Fue fundada en'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('descripcion'))
		       	@foreach ($errors->get('descripcion') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('id','ID Carrera:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('id','',array('class'=>'form-control','placeholder'=>'IN'))}}
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
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
