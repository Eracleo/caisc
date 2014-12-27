@extends('layouts.base_admin')
@section('title')
Perfil <small>Alumno</small>
@stop
@section('options')
<li>{{HTML::link('alumnos','Listar')}}</li>
<li>{{HTML::link('alumno/add.html','Nuevo')}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		{{ HTML::image('assets/foto/'.$alumno->foto,'User Image',array('class'=>'')) }}
		<p align="center"><b>código:</b>{{ $alumno->codAlumno }}</p>
		<p>{{ HTML::link('alumno/imagen/'.$alumno->id,'Cambiar Imagen') }}</p>
	</div>
	<div class="col-lg-7">
		<p><b>DNI:</b>{{ $alumno->dni }}</p>
		<p><b>Nombre:</b> {{ $alumno->nombre }}</p>
		<p><b>Apellidos:</b> {{ $alumno->apellidos }}</p>
		<p><b>Dirección:</b> {{ $alumno->direccion }}</p>
		<p><b>Teléfono:</b> {{ $alumno->telefono}}</p>
		<p><b>E-mail:</b> {{ $alumno->email }}</p>
		<?php
			if($alumno->estado == 0 ){
		?>
				<p><b>Estado:</b> Inactivo</p>
		<?php
			}
			else{
		?>
				<p><b>Estado:</b> Activo</p>
		<?php
			}
		?>
	</div>
</div>
@stop