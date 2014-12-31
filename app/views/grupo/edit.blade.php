@extends('layouts.base_admin')
@section('title')
Editar Grupo {{ $grupo -> nombre }}
@stop
@section('options')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('GrupoController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('GrupoController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
	<div class="col-sm-4">
		{{ Form::open(array('url' => 'grupo/' . $grupo->id, 'method' =>'put')) }}
        <label>Nombre: </label>
		 <input class="form-control" title="Se necesita un nuevo Grupo" type="text" name="nombre" pattern="^[a-zA-Z ]*$" placeholder ="Grupo A" required/> <br/>
		<br/>
		{{ Form::submit('Modificar')}}
		&nbsp;&nbsp;&nbsp;&nbsp;
        {{HTML::linkAction('GrupoController@index', 'Cancelar')}}
		{{ Form::close()}}
    </div>
@stop