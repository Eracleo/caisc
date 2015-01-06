@extends('layouts.base_docente')
@section('title')
Mis Cursos de Carrera Técnica
@stop
@section('options')
<li>Mis Cursos de Carrera</li>

@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
           

            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th class="hidden">Cod Carga Academica</th>
                        <th >Codigo </th>
                        <th >Nombre del Curso</th>
                        <th >Carrera</th>
                        <th >Semestre</th>
                        <th >Turno</th>
                        <th >Procedimientos</th>
                    </tr>
                </thead>

                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach($cursos as $curso)
                        <tr class="odd">
                            <td class="hidden">{{$curso->CodCargaAcademica_ct}}</td>

                            <td class=" ">{{$curso->id}}</td>
                            <td class=" ">{{$curso->nombre}}</td>
                            <td class=" ">{{ Carrera::find($curso->codCarrera)->nombre}}</td>
                            <td class=" ">{{Semestre::find($curso->semestre)->nombre}}</td>
                            <td class=" ">{{Turno::find($curso->turno)->nombre}}</td>
                            <td class=" ">
                               {{ HTML::link('SilaboCarreraTecnica/create/'.$curso->CodCargaAcademica_ct,'Ingresar Silabus' ,array('class'=>'btn btn-warning'))}}
                               <br>
                               <br>
                               {{ HTML::link('SilaboCarreraTecnica/index/'.$curso->CodCargaAcademica_ct,'Ver Silabus' ,array('class'=>'btn btn-success'))}}
                            </td>
                        <tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
        
        
    </div>
</div>  
@stop