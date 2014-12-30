@extends('layouts.base_docente')
@section('title')
Mis Cursos de Carrera
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Docentes')}} </li>
<li>Mis Cursos de Carrera</li>
@stop

<style>
    span {
        margin: 5px;
    }
    span a{
        color: white;
    }
</style>


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
                <!--    <div id="example1_filter" class="dataTables_filter">
                        <label>Buscar: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('#','Buscar Curso') }}
                    </div> -->
                </div>
            </div>

            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Cod Carga Academica</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Cod Curso</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nombre</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Semestre</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Turno</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Procedimientos</th>
                    </tr>
                </thead>

                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach($cursos as $curso)
                        <tr class="odd">
                            <td class=" ">{{$curso->CodCargaAcademica_ct}}</td>
                            <td class=" ">{{$curso->id}}</td>
                            <td class=" ">{{$curso->nombre}}</td>
                            <td class=" ">{{$curso->semestre}}</td>
                            <td class=" ">{{$curso->turno}}</td>
                            <td class=" ">
                              <span class = "label label-danger">  {{ HTML::link('SilaboCarreraTecnica/create/'.$curso->CodCargaAcademica_ct,'Ingresar Silabus') }} </span>
                            </td>
                        <tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
        <br>
        <span class="label label-success"> {{ HTML::link('SilaboCarreraTecnica/index.html/','Ver Todos los Silabos') }}</span> 
        
    </div>
</div>  
@stop