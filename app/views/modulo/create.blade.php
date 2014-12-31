@extends('layouts.base_admin')
@section('title')
Nuevo MODULO
@stop
@section('options')
    <li>{{HTML::linkAction('ModuloController@index', 'Todos')}}</li>
    <li>Nuevo</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
        {{ Form::open(array('url' => 'modulo')) }}
         <label>Nombre:</label>
         <input title="Se necesita un nuevo modulo" type="text" name="nombre" pattern="^[a-zA-Z]*$" class="form-control" placeholder="Primer" required/> <br/>
        <br/>
        {{ Form::submit('Guardar')}}
        &nbsp;&nbsp;&nbsp;&nbsp;
        {{HTML::linkAction('ModuloController@index', 'Cancelar')}}
        {{ Form::close()}}
    </div>
@stop