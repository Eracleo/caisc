@extends('layouts.base_admin')
@section('title')
Lista <small>SILABO CARRERA TECNICA </small>
@stop
@section('breadcrumb')
<li>Silabo Carrera Tecnica</li>
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
                    <div class="dataTables_length" id="example1_length">
                        <label><select aria-controls="example1" size="1" name="example1_length">
                            <option selected="selected" value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> records per page</label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Search: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('SilaboCarreraTecnica/create.html','Agregar Silabo') }}
                    </div>
                </div>
            </div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Nro de Silabus</th>
                        <th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">titulo del Silabo</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">descripcion</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">orden</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Actions</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $datos as $dato)
                <tr class="odd">
                        <td class=" "><b>{{ $dato->id }}</b></td>
                        <td class=" ">{{ $dato->titulo }}</td>
                        <td class=" ">{{ $dato->descripcion}}</td>
                        <td class=" ">{{ $dato->orden}}</td>
                        <td class=" ">
                            {{ HTML::link('SilaboCarreraTecnica/post_delete/'.$dato->id,'Eliminar') }}
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
