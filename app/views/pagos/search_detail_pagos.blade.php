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
        <form method="get" action="search_detail_pagos">

        <label>Nro de Boleta:</label>
        <div class="form-inline">         
            <div class="form-group">

              <input name="boleta" type="txt" class="form-control" value="">
            </div>
          
          <button type="submit" class="btn btn-default btn-sm">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
          </button>

        </div>

        
        </form>
          
    <table id="detalle_pago" class="table table-striped">
        <thead>
          <tr>
            <th>Número Boleta</th>
            <th>Modalidad</th>
            <th>Concepto</th>
          </tr>
        </thead>
        <tbody>

        @if (!empty($detalle_pagos))
            @foreach($detalle_pagos as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->id_modalidad }}</td>
                    <td>{{ $detalle->descripcion }}</td>
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
