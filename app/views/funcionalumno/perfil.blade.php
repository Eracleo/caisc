@extends('layouts.base_alumno')
@section('title')
Perfil del Alumno
@stop
@section('options')
<li>{{HTML::link('alumnoB/modificar','Modificar Datos')}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		{{ HTML::image('assets/foto/'.$alumno->foto,'User Image',array('class'=>'')) }}
		<p>{{ HTML::link('alumnoB/imagen/'.$alumno->id,'Cambiar Imagen') }}</p>
	</div>
	<div class="col-lg-7">
		<p><b>Código del Alumno:</b>{{$alumno->id}}</p>
		<p><b>DNI:</b>{{ $alumno->dni }}</p>
		<p><b>Nombre:</b> {{ $alumno->nombre }}</p>
		<p><b>Apellidos:</b> {{ $alumno->apellidos }}</p>
		<p><b>Dirección:</b> {{ $alumno->direccion }}</p>
		<p><b>Teléfono:</b> {{ $alumno->telefono}}</p>
		<p><b>E-mail:</b> {{ $alumno->email }}</p>
		<p><b>Modulo Actual:</b> {{ $alumno->modulo }}</p>
		<p><b>Codigo Carrera Profesional:</b> {{ $alumno->codCarrera }}</p>
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