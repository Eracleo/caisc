@extends('layouts.base_admin')
@section('title')
Eliminar <small>CURSO LIBRE </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('CursosLibres/index.html','Cursos Libres') }}</li>
<li>Eliminar Curso</li>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <div class="row">
                <div class="col-xs-6">
                   
                </div>
                <div class="col-xs-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Search: <input aria-controls="example1" type="text"></label>
                        <a href="create.html"><span class="label label-success">AGREGAR CURSO</a>
                    </div>
                </div>
            </div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Codigo Curso</th>
                        <th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nombre del Curso</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Academicas</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Actions</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $datos as $dato)
                <tr class="odd">
                        <td class=" "><b>{{ $dato->id }}</b></td>
                        <td class=" ">{{ $dato->nombre }}</td>
                        <td class=" ">{{ $dato->horas_academicas }}</td>
                        <td class=" ">
                        <a href="post_delete/{{ $dato->id }}"><span class="label label-danger">Eliminar</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
                 Pagina Actual:{{ $datos->getCurrentPage()}}
            </div>
                {{ $datos->links()}}
    </div><!-- /.box-body -->
</div>
@stop
