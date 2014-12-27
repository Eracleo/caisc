@extends('layouts.base_admin')
@section('title')
Editar Turno {{ $turno -> nombre }}
@stop
@section('options')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('TurnoController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('TurnoController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
  <div class="col-sm-4">
                  {{ Form::open(array('url' => 'turno/' . $turno->id, 'method' =>'put')) }}
                  <label>Nombre: </label>
                   <input value="{{ $turno -> nombre }}" class="form-control" title="Se necesita un nuevo turno" type="text" name="nombre" pattern="^[a-zA-Z]*$" required/> <br/>
                  <br/>
                  {{ Form::submit('Modificar')}}
                  &nbsp;&nbsp;&nbsp;&nbsp;
                            {{HTML::linkAction('TurnoController@index', 'Cancelar')}}
                  {{ Form::close()}}
</div>
@stop