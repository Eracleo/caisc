@extends('layouts.base_alumno')
@section('title')
Lista de matriculas realizadas por el estudiante
@stop
@section('options')
@stop
@section('content')
    <div class="box-header">
        <label>Lista de Cargas Academicas a los cuales se puede matricular el alumno</label><br>
        <h3>{{$alumno->nombre,' ',$alumno->apellidos}}</h3>
</div>
<div class="box">
    <div class="box-body table-responsive">
        <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
            <thead>
                <tr role="row">
                    <th colspan="1" rowspan="1">Código Matrícula</th>
                    <th colspan="1" rowspan="1">Semestre</th>
                    <th colspan="1" rowspan="1">Código Carga Academica</th>
                    <th colspan="1" rowspan="1">Código Curso</th>
                    <th colspan="1" rowspan="1">Curso</th>
                    <th colspan="1" rowspan="1">Docente</th>
                    <th colspan="1" rowspan="1">turno</th>
                    <th colspan="1" rowspan="1">grupo</th>
                    <th colspan="1" rowspan="1">Action</th>
                </tr>
            </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $cursos as $curso)
                <tr class="odd">
                        <td class=" ">{{ $curso->id }}</td>
                        <td class=" ">{{ Semestre::find($curso->semestre)->nombre}}</td>
                        <td class=" ">{{ $curso->codCargaAcademica_ct }}</td>
                        <td class=" ">{{ $curso->codCurso_ct }}</td>
                        <td class=" ">{{ $curso->curso }}</td>
                        <td class=" ">{{ $curso->docente }}</td>
                        <td class=" ">{{ $curso->turno }}</td>
                        <td class=" ">{{ $curso->grupo }}</td>
                        <td class=" ">
                            <span class="label label-danger">{{ HTML::link('alumnoB/delete/'.$curso->id,'Eliminar') }}</span>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop