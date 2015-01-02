@extends('layouts.base_admin')
@section('title')
Perfil <small>Aula</small>
@stop
@section('options')
<li>{{HTML::link('Aula','Listar')}}</li>
<li>{{HTML::link('Aula/add.html','Nueva Aula')}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
		<p><b>Codigo Aula: </b>{{ $aula->codAula }}</p>
		<p><b>Capacidad: </b> {{ $aula->capacidad }}</p>
		<p>
			<div class="col-xs-12 col-sm-6 col-md-4">
    		{{HTML::linkAction('AulaController@index', 'Retornar','',array('class'=>'col-sm-8 btn btn-primary'))}}
    		</div>
    		<div class="col-xs-12 col-sm-6 col-md-4">
        	{{HTML::linkAction('AulaController@ActualizarConID', 'Actualizar',$aula->codAula,array('class'=>'col-sm-8 btn btn-warning'))}}
        	</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
			{{HTML::linkAction('AulaController@post_eliminar', 'Eliminar',$aula->codAula,array('class'=>'col-sm-8 btn btn-danger'))}}
			</div>
		</p>
	</div>
	
</div>
@stop
