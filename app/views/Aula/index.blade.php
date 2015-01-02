@extends('layouts.base_admin')
@section('title')
Lista <small> AULAS </small>
@stop
@section('options')
<li>{{HTML::link('Aula','Listar')}}</li>
<li>{{HTML::link('Aula/add.html','Nueva Aula')}}</li>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">
                <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Codigo de Aula</th>
                <th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Capacidad</th>
                <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Actions</th>
            </tr>
        </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $datos as $dato)
                <tr class="odd">
                    <td class=" ">{{ $dato->codAula }}</td>
                    <td class=" ">{{ $dato->capacidad }}</td>
                    <td class="" >
                        <span class="label label-warning">{{ HTML::link('Aula/updatecID/'.$dato->codAula,'Actualizar') }}</span>
                        <span class="label label-danger">{{ HTML::link('Aula/post_eliminar/'.$dato->codAula,'Eliminar') }}</span>
                        <span class="label label-primary">{{ HTML::link('Aula/profile/'.$dato->codAula,'Detalles') }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    Pagina Actual:{{ $datos->getCurrentPage()}}
    {{ $datos->links()}}

</div>
@stop
