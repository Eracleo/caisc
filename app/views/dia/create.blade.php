@extends('layouts.base_admin')
@section('title')
Nuevo Dia
@stop
@section('options')
    <li>{{HTML::linkAction('DiaController@index', 'Todos')}}</li>
    <li>Nuevo</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-sm-4">
        {{ Form::open(array('url' => 'dia')) }}
        <label>Nombre: </label>
        <input title="Se necesita un nuevo dia" list="listadias" type="nombre" name="nombre" pattern="^[a-zA-Z]*$" class="form-control" placeholder="Dia valido" required/> <br/>
     
<datalist id="listadias" >
  <option value="Lunes" >
  <option value="Martes" >
  <option value="Miercoles" >
  <option value="Jueves" >
  <option value="Viernes" >
    <option value="Sabado">
</datalist>
        <br/>
        {{ Form::submit('Guardar')}}
        &nbsp;&nbsp;&nbsp;&nbsp;
        {{HTML::linkAction('DiaController@index', 'Cancelar')}}
        {{ Form::close()}}
    </div>
@stop