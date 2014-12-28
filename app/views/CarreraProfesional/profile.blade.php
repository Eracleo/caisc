@extends('layouts.base_admin')
@section('title')
Perfil <small>Carrera Profesional</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('CarreraProfesional','Carrera Profesional') }}</li>
<li>{{$carrera->nombre}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		<p align="center"><b>código:</b>{{ $carrera->id }}</p>
	</div>
	<div class="col-lg-7">
		<p>{{ HTML::link('CarreraProfesional/updatecID/'.$carrera->id,'Editar') }} {{ HTML::link('CarreraProfesional/post_eliminar/'.$carrera->id,'Eliminar') }} </p>
		<p><b>ID:</b>{{ $carrera->id }}</p>
		<p><b>Nombre:</b> {{ $carrera->nombre }}</p>
		<p><b>Descripcion:</b> {{ $carrera->descripcion }}</p>
	</div>
</div>
@stop
