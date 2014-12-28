@extends('layouts.base_admin')
@section('title')
Editar Carrera Profesional <small> {{$carrera->nombre}}  </small>
{{$carrera-> id}}
@stop
@section('breadcrumb')
<li>{{ HTML::link('CarreraProfesional','Carrera profesional')}} </li>
<li>{{ HTML::link('CarreraProfesional/profile/'.$carrera->id,$carrera->nombre)}}</li>
<li>Editar</li>
@stop
@section('content')
<div class="ccol-xs-12 col-sm-12">
{{ Form::model($carrera,array('url'=>array('CarreraProfesional/update',$carrera->id),'method'=> 'POST','class'=>'form-horizontal','role'=>'form'))}}
	<div class="form-group">
		{{ Form::label('nombre','Nombre:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre',$carrera->nombre,array('class'=>'form-control','placeholder'=>'Carrera Pro'))}}
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
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('descripcion',$carrera->descripcion,array('class'=>'form-control','placeholder'=>'Fue fundada'))}}
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
		{{ Form::label('id','ID:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('id',$carrera->id,array('class'=>'form-control','placeholder'=>'IN'))}}
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
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
