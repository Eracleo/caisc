@extends('layouts.base_admin')
@section('title')
Perfil <small>PERSONAL</small>
@stop
@section('options')
<li>{{HTML::link('personal','Listar')}}</li>
<li>{{HTML::link('personal/add.html','Nuevo')}}</li>
<li><a href="#">Perfil</a></li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		{{ HTML::image('assets/foto/'.$personal->foto,'User Image',array('class'=>'')) }}
		<p align="center"><b>código:</b>{{ $personal->id }}</p>
		<p align="center">{{ HTML::link('personal/imagen/'.$personal->id,'Cambiar Imagen') }} </p>
	</div>
	<div class="col-lg-7">
		<p>{{ HTML::link('personal/edit/'.$personal->id,'Editar') }} {{ HTML::link('personal/password/'.$personal->id,'Cambiar Contraseña') }}</p>
		@if(! $personal->estado)
		<p><span class="label label-danger">Eliminado</span></p>
		@endif
		<p><b>DNI:</b>{{ $personal->dni }}</p>
		<p><b>Nombre:</b> {{ $personal->nombre }}</p>
		<p><b>Apellidos:</b> {{ $personal->apellidos }}</p>
		<p><b>Dirección:</b> {{ $personal->direccion }}</p>
		<p><b>Teléfono:</b> {{ $personal->telefono}}</p>
		<p><b>E-mail:</b> {{ $personal->email }}</p>
		<p><b>Cargo:</b> {{ $personal->cargo->nombre }}</p>
	</div>
</div>
@stop
