@extends('layouts.base_admin')
@section('title')
Editar Dia {{ $dia -> nombre }}
@stop
@section('breadcrumb')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('DiaController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('DiaController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
		{{ Form::open(array('url' => 'dia/' . $dia->id, 'method' =>'put')) }}
        <label>Nombre: </label>
         <input value="{{ $dia -> nombre }}" class="form-control" title="Se necesita un nuevo dia" type="text" name="nombre" pattern="^[a-zA-Z]*$" required/> <br/>

		<br/>
		{{ Form::submit('Modificar')}}
		&nbsp;&nbsp;&nbsp;&nbsp;
        {{HTML::linkAction('DiaController@index', 'Cancelar')}}
		{{ Form::close()}}
    </div>
@stop