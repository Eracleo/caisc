@extends('layouts.base_admin')
@section('title')
Consulta Caja y Facturación
@stop
@section('options')
<li >{{ HTML::link('/alumno','Todos') }}</li>
<li>{{ HTML::link('/alumno/create','Nuevo') }}</li>
@stop
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <form method="get" action="search_pagos_alumno">
        <label>Codigo :</label>
        <div class="form-inline">
            <div class="form-group">

              <input name="codigo" type="txt" class="form-control" placeholder="Codigo" value="">
            </div>
          <button type="submit" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
          </button>
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
