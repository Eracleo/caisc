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
    <form method="get" action="search_detail_pagos">
        <label>Nro de Boleta:</label>
        <div class="form-inline">
            <div class="form-group">
                <input name="boleta" type="txt" class="form-control" value="">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">
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
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($detalle_pagos))
                    <tr>
                        <td>{{ $detalle_pagos->id }}</td>
                        <td>{{ $detalle_pagos->id_modalidad }}</td>
                        <td>{{ $detalle_pagos->descripcion }}</td>
                        <td>{{ $detalle_modalidad->monto}}</td>
                    </tr>
                           
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
