@extends('layouts.base_'.Str::lower(Auth::user()->tipoUsuario))
@section('title')
{{$docente->nombre}} <small>Perfil Docente</small>
@stop
@section('breadcrumb')
<li class="active">{{ HTML::link('docente/profile/'.$docente->id,'Perfil') }}</li>
<li>{{ HTML::link('docente/edit/'.$docente->id,'Editar') }}</li>
<li>{{ HTML::link('docente/password/'.$docente->id,'Cambiar Contraseña') }}</li>
@stop
@section('content')
<div class="row">
	<div class="col-sm-3">
		{{ HTML::image('assets/foto/'.$docente->foto,'User Image',array('class'=>'')) }}
		<p align="center">{{ HTML::link('docente/imagen/'.$docente->id,'Cambiar Imagen') }}</p>
	</div>
	<div class="col-sm-7">
		@if(! $docente->estado)
			<p><span class="label label-danger">Eliminado</span></p>
		@endif
		<p><b>código:</b>{{ $docente->id }}</p>
		<p><b>DNI:</b>{{ $docente->dni }}</p>
		<p><b>Nombre:</b> {{ $docente->nombre }}</p>
		<p><b>Apellidos:</b> {{ $docente->apellidos }}</p>
		<p><b>Dirección:</b> {{ $docente->direccion }}</p>
		<p><b>Teléfono:</b> {{ $docente->telefono}}</p>
		<p><b>E-mail:</b> {{ $docente->email }}</p>
	</div>
</div>
@stop
