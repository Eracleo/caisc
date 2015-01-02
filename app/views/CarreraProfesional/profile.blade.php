@extends('layouts.base_admin')
@section('title')
Perfil <small>Carrera Profesional</small>
@stop
@section('options')
<li>{{HTML::link('CarreraProfesional','Listar')}}</li>
<li>{{HTML::link('CarreraProfesional/add.html','Nueva Carrera')}}</li>
@stop
@section('content')
<div class="row">
	
	<div class="col-lg-7">
		<p><b>Código: </b>{{ $carrera->id }}</p>
		<p><b>Nombre: </b> {{ $carrera->nombre }}</p>
		<p><b>Descripcion: </b> {{ $carrera->descripcion }}</p>
		<p>
			<div class="col-xs-12 col-sm-6 col-md-4">
    		{{HTML::linkAction('CarreraProfesionalController@index', 'Retornar','',array('class'=>'col-sm-8 btn btn-primary'))}}
    		</div>
    		<div class="col-xs-12 col-sm-6 col-md-4">
        	{{HTML::linkAction('CarreraProfesionalController@ActualizarConID', 'Actualizar',$carrera->id,array('class'=>'col-sm-8 btn btn-warning'))}}
        	</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
			{{HTML::linkAction('CarreraProfesionalController@post_eliminar', 'Eliminar',$carrera->id,array('class'=>'col-sm-8 btn btn-danger'))}}
			</div>
		</p>
	</div>
</div>
@stop
