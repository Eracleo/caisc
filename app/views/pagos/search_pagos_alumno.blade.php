@extends('layouts.base_admin')
@section('title')
Consulta Caja y Facturación
@stop
@section('options')
<!--<li >{{ HTML::link('/alumno','Todos') }}</li>
<li>{{ HTML::link('/alumno/create','Nuevo') }}</li>-->
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
    <form method="get" action="search_pagos_alumno">
        <label>Codigo :</label>
        <div class="form-inline">
            <div class="form-group">
              <input name="codigo" type="txt" class="form-control" placeholder="Codigo" value="">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">
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

        @if (!empty($datos))
            @foreach($datos as $pag)
                <tr>
                    <td>{{ HTML::link('pagos/search_detail_pagos?boleta='.$pag->id ,$pag->id ) }}</td>
                    <td>{{ $pag->nro_serie }}</td>
                    <td>{{ HTML::link('alumno/profile/'.$pag->id_alumno,$pag->id_alumno) }}</td>
                    <td>{{ $pag->fecha }}</td>
                    <td>{{ $pag->total_pago }}</td>
                </tr>
            @endforeach
        @else
        <p>

        </p>
        @endif

        </tbody>
    </table>
    @if(Session::has('message'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
</div>
    <div class="row">
        <div class="col-sm-2"><p><b>Pagina Actual:</b> {{ $datos->getCurrentPage()}}</p></div>
        <div class="col-sm-6">{{ $datos->links()}}</div>
    </div>
@stop
