@extends('layouts.base_admin')
@section('title')
 Grupo {{ $grupo -> nombre }}
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
    	<table class="table table-bordered table-striped dataTable">
            <thead>
                <tr role="row">
                    <th> Atributos</th>
                    <th>Datos</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <tr class="odd">
                    <td class=" sorting_1" align="center">ID </td>
                    <td class="" align="center">{{ $grupo -> id }}</td>
                </tr>
                <tr class="odd">
                    <td class=" sorting_1" align="center">NOMBRE</td>
                    <td class="" align="center">{{ $grupo -> nombre }}</td>
                </tr>
            </tbody>
    	</table>
    	<p align="center">{{HTML::linkAction('GrupoController@index', 'Regresar')}}</p>
    </div>
@stop