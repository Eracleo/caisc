@extends('layouts.base_admin')
@section('title')
Constancia de Matriculas del Alumno 
@stop
@section('options')
@stop
@section('content')
<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr role="row">
            <th colspan="1" rowspan="1">Código Matricula</th>
            <th colspan="1" rowspan="1">Código Carga Academica</th>
            <th colspan="1" rowspan="1">Semestre</th>
            <th colspan="1" rowspan="1">Código Curso</th>
            <th colspan="1" rowspan="1">Curso</th>
            <th colspan="1" rowspan="1">Código Docente</th>
            <th colspan="1" rowspan="1">Nombre Docente</th>
            <th colspan="1" rowspan="1">Turno</th>
            <th colspan="1" rowspan="1">Grupo</th>
            <th colspan="1" rowspan="1">Action</th>
        </tr>
    </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $cursos as $matricula)
        <tr class="odd">
            <td class=" "><b>{{ $matricula->id }}</b></td>
            <td class=" "><b>{{ $matricula->codCargaAcademica_ct }}</b></td>
            <td class=" "><b>{{ $matricula->semestre }}</b></td>
            <td class=" "><b>{{ $matricula->codCurso_ct }}</b></td>
            <td class=" "><b>{{ $matricula->curso }}</b></td>
            <td class=" "><b>{{ $matricula->codDocente }}</b></td>
            <td class=" "><b>{{ $matricula->docente }}</b></td>
            <td class=" "><b>{{ $matricula->turno }}</b></td>
            <td class=" "><b>{{ $matricula->grupo }}</b></td>
            <td class=" ">
                <span class="label label-danger">{{ HTML::link('matriculas_ct/delete/'.$matricula->id,'Eliminar') }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop