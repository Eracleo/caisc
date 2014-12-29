@extends('layouts.base_admin')
@section('title')
Perfil <small>Aula</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('Aula','Aula') }}</li>
<li>{{$aula->codAula}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		<p align="center"><b>código:</b>{{ $aula->codAula }}</p>
	</div>
	<div class="col-lg-7">
		<p>{{ HTML::link('Aula/updatecID/'.$aula->codAula,'Editar') }} {{ HTML::link('Aula/post_eliminar/'.$aula->codAula,'Eliminar') }} </p>
		<p><b>ID:</b>{{ $aula->codAula }}</p>
		<p><b>Nombre:</b> {{ $aula->capacidad }}</p>
	</div>
</div>
@stop
