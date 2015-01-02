@extends('layouts.base_admin')
@section('title')
Actualizar Aula: <small> {{$aula->codAula}} </small>
@stop
@section('options')
<li>{{HTML::link('Aula','Listar')}}</li>
<li>{{HTML::link('Aula/add.html','Nueva Aula')}}</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'Aula/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('codAula','Codigo Aula',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('codAula',$aula->codAula,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('capacidad','Capacidad:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('capacidad',$aula->capacidad,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>	
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-4">
			{{HTML::linkAction('AulaController@index', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
