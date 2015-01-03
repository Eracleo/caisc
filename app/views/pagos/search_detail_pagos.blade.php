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
                @foreach($detalle_pagos as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->id_modalidad }}</td>
                        <td>{{ $detalle->descripcion }}</td>
                        <td> 
                        @if (!empty($detalle_modalidad))
                            @foreach($detalle_modalidad as $detalle)       
                                {{ $detalle->monto }}
                            @endforeach
                        @endif
                        </td>
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
@stop
