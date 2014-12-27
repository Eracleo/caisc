@extends('layouts.base_admin')
@section('title')
Nuevo Semestre
@stop
@section('options')
    <li class="active todos"><i class="fa fa-fw fa-th-list"></i>{{HTML::linkAction('SemestreController@index', 'Todos')}}</li>
    <li class="nuevo"><i class="fa fa-fw fa-plus"></i>Nuevo</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
		{{ Form::open(array('url' => 'semestre')) }}
        <label>Nombre: </label>
		 <input class="form-control" title="Se necesita un nuevo semestre" type="number" min = "1" max ="12" name="nombre" required/> <br/>
		<br/>
		{{ Form::submit('Guardar')}}
        &nbsp;&nbsp;&nbsp;&nbsp;
        {{HTML::linkAction('SemestreController@index', 'Cancelar')}}
		{{ Form::close()}}
</div>
@stop