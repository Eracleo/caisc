@extends('layouts.base_docente')
@section('title')
Mis Cursos Libres
@stop
@section('options')
<li>Mis Cursos Libres</li>
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
                   <!-- <div id="example1_filter" class="dataTables_filter">
                        <label>Buscar: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('#','Buscar Curso') }}
                    </div> -->
                </div>
            </div>

            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th class="hidden">Cod Carga Academica</th>
                        <th>Codigo </th>
                        <th>Nombre del Curso</th>
                        <th>Procedimientos</th>
                    </tr>
                </thead>

                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach($cursos as $curso)
                        <tr class="odd">
                            <td class="hidden">{{$curso->CodCargaAcademica_cl}}</td>
                            <td class=" ">{{$curso->id}}</td>
                            <td class=" ">{{$curso->nombre}}</td>
                            <td class=" ">
                                {{ HTML::link('SilaboCarreraLibre/create/'.$curso->CodCargaAcademica_cl,'Ingresar Silabus' ,array('class'=>'btn btn-warning'))}}
                                <br>
                                <br>
                                {{ HTML::link('SilaboCarreraLibre/index/'.$curso->CodCargaAcademica_cl,'Ver Silabus' ,array('class'=>'btn btn-success'))}}
                              </td>
                        <tr>
                    @endforeach 
                </tbody>
            </table>

        </div>

        
    </div>
</div>  
@stop