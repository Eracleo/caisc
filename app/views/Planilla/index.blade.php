@extends('layouts.base_docente')
@section('title')
Lista de pago de Planilla
@stop
@section('breadcrumb')

<li>Planilla</li>
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
                                           </div>
                </div>

            </div>
            <div class="form-group">
                {{ Form::label('semestre','Seleccione Semestre  :',array('class'=>'col-sm-4 control-label')) }}
                <div class="col-sm-4">
                    {{ Form::select('semestre',$semestres,null,array('class'=>'form-control'))}}
                </div>
            </div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Cod Docente</th>
                        <th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Apellidos y Nombres</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">E-mail</th>
                        <th aria-label="Engine version: activate to sort column ascending" style="width: 163px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Teléfono</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Actions</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $datos as $dato)
                <tr class="odd">
                        <td class="  sorting_1">{{ HTML::link('Planilla/profile/'.$dato->id,$dato->id) }}</td>
                        <td class=" "><b>{{ $dato->apellidos }}</b> {{ $dato->nombre }}</td>
                        <td class=" ">{{ $dato->email }}</td>
                        <td class=" ">{{ $dato->telefono }}</td>
                        <td class=" ">
                            {{ HTML::link('Planilla/detalle_Planilla/'.$dato->id,'Ver Detalles') }}

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
