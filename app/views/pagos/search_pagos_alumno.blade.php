@extends('layouts.base_admin')
@section('title')
Consulta Caja y Facturación
@stop
@section('content')

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li >{{ HTML::link('/pagos','Todos') }}</li>
              <li>{{ HTML::link('/pagos/create','Nuevo') }}</li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="panel-body" >
        <form method="get" action="search_pagos_alumno">

        <label>Codigo :</label>
        <div class="form-inline">         
            <div class="form-group">

              <input name="codigo" type="txt" class="form-control" placeholder="Codigo" value="">
            </div>
          
          <button type="submit" class="btn btn-default btn-sm">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
          </button>

        </div>

        
        </form>
          
    <table id="detalle_pago" class="table table-striped">
        <thead>
          <tr>
            <th>Número</th>
            <th>Serie</th>
            <th>Id Alumno</th>
            <th>Fecha</th>
            <th>Total (S/.)</th>
          </tr>
        </thead>
        <tbody>

        @if (!empty($pagos))
            @foreach($pagos as $pag)
                <tr>
                    <td>{{ $pag->id }}</td>
                    <td>{{ $pag->nro_serie }}</td>
                    <td>{{ $pag->id_alumno }}</td>
                    <td>{{ $pag->fecha }}</td>
                    <td>{{ $pag->total_pago }}</td>
                </tr>
            @endforeach
        @else
        <p>
          No existe información para ésta modalidad.
        </p>
        @endif

            
        </tbody>
    </table>
    

  </div>
    @if(Session::has('message'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
  </div>
@stop
