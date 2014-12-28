@extends('layouts.base_admin')
@section('title')
Editar Semestre {{ $semestre -> nombre }}
@stop
@section('options')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('SemestreController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('SemestreController@create', 'Nuevo')}}</li>
@stop

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
		{{ Form::open(array('url' => 'semestre/' . $semestre->id, 'method' =>'put')) }}
        <label>Nombre: </label>
		<input class="form-control" title="Se necesita un nuevo semestre" type="text" name="nombre" pattern="^[0-9 -]*$" required/> <br/>
		<br/>
		{{ Form::submit('Modificar')}}
		&nbsp;&nbsp;&nbsp;&nbsp;
        {{HTML::linkAction('SemestreController@index', 'Cancelar')}}
		{{ Form::close()}}
    </div>
@stop