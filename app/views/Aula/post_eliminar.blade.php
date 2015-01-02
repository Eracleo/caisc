@extends('layouts.base_admin')
@section('title')
Eliminar <small>AULA</small>
@stop
@section('options')
<li>{{HTML::link('Aula','Listar')}}</li>
<li>{{HTML::link('Aula/add.html','Nueva Aula')}}</li>
@stop

@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'Aula/delete','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
		{{ Form::label('codAula','Esta seguro de eliminar esta aula:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-2">
			{{ Form::text('codAula',$aula->codAula,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('capacidad','Capacidad:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-2">
			{{ Form::text('capacidad',$aula->capacidad,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-12 col-sm-4 col-md-2">
			{{HTML::linkAction('AulaController@index', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-4 col-md-2">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop
