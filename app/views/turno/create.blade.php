@extends('layouts.base_admin')
@section('title')
Nuevo Turno
@stop
@section('options')
    <li class="active todos"><i class="fa fa-fw fa-th-list"></i>{{HTML::linkAction('TurnoController@index', 'Todos')}}</li>
    <li class="nuevo"><i class="fa fa-fw fa-plus"></i>Nuevo</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
    {{ Form::open(array('url' => 'turno')) }}
    <label>Nombre: </label>
     <input class="form-control" title="Se necesita un nuevo turno" type="text" name="nombre" pattern="^[a-zA-Z ñ Ñ]*$" placeholder="MAÑANA" required/> <br/>
    <br/>
    {{ Form::submit('Guardar')}}
    &nbsp;&nbsp;&nbsp;&nbsp;
    {{HTML::linkAction('TurnoController@index', 'Cancelar')}}
    {{ Form::close()}}
    </div>
@stop