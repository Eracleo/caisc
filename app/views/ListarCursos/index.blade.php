@extends('layouts.base_admin')
@section('title')
Cursos Docente
@stop
@section('breadcrumb')
<li>DOCENTE</li>
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
                        </select> Filas que desea visualizar</label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Buscar: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('#','Buscar Curso') }}
                    </div>
                </div>
            </div>

            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Cod Carga Academica</th>
                        <th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Cod Curso</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nombre</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Procedimientos</th>
                    </tr>
                </thead>

                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach($cursos as $curso)
                        <tr class="odd">
                            <td class=" ">{{$curso->CodCargaAcademica_cl}}</td>
                            <td class=" ">{{$curso->id}}</td>
                            <td class=" ">{{$curso->nombre}}</td>
                            <td class=" ">
                                {{ HTML::link('SilaboCarreraLibre/create/'.$curso->CodCargaAcademica_cl,'Ingresar Silabus') }}
                            </td>
                        <tr>
                    @endforeach 
                </tbody>
            </table>

        </div>
        {{ HTML::link('SilaboCarreraLibre/index.html/','Ver Todos los Silabos') }}
    </div>
</div>  
@stop