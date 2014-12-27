@extends('layouts.base_admin')
@section('title')
Editar Grupo {{ $modulo -> nombre }}
@stop

@section('options')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('ModuloController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('ModuloController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
        {{ Form::open(array('url' => 'modulo/' . $modulo->id, 'method' =>'put')) }}
        <label>Nombre: </label>
         <input value="{{ $modulo->nombre }}" title="Se necesita un nuevo modulo" type="text" name="nombre" pattern="^[a-zA-Z]*$" class="form-control" required/> <br/>
        <br/>
        {{ Form::submit('Modificar')}}
        &nbsp;&nbsp;&nbsp;&nbsp;
                  {{HTML::linkAction('ModuloController@index', 'Cancelar')}}
        {{ Form::close()}}
    </div>
@stop