@extends('layouts.base_alumno')
@section('title')
Constancia de Matriculas del Alumno
@stop
@section('options')
@stop
@section('content')
<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr role="row">
            <th colspan="1" rowspan="1">Código Carga Academica</th>
            <th colspan="1" rowspan="1">Semestre</th>
            <th colspan="1" rowspan="1">Código Curso</th>
            <th colspan="1" rowspan="1">Curso</th>
            <th colspan="1" rowspan="1">Nombre Docente</th>
            <th colspan="1" rowspan="1">Turno</th>
            <th colspan="1" rowspan="1">Grupo</th>
        </tr>
    </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $cursos as $matricula)
        <tr class="odd">
            <td class=" ">{{ $matricula->codCargaAcademica_ct }}</td>
            <td class=" ">{{ Semestre::find($matricula->semestre)->nombre }}</td>
            <td class=" ">{{ $matricula->codCurso_ct }}</td>
            <td class=" ">{{ $matricula->curso }}</td>
            <td class=" ">{{ $matricula->docente }}</td>
            <td class=" ">{{ Turno::find($matricula->turno)->nombre }}</td>
            <td class=" ">{{ Grupo::find($matricula->grupo)->nombre }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop