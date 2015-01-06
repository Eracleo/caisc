@extends('layouts.base_admin')
@section('title')
Relacion de Matriculas Carrera Técnica
@stop
@section('options')
@stop
@section('content')
<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr role="row">
            <th colspan="1" rowspan="1">Código Matricula</th>
            <th colspan="1" rowspan="1">Semestre</th>
            <th colspan="1" rowspan="1">Código Alumno</th>
            <th colspan="1" rowspan="1">Nombre Alumno</th>
            <th colspan="1" rowspan="1">Código Carga Academica</th>
            <th colspan="1" rowspan="1">Nombre Curso</th>
            <th colspan="1" rowspan="1">Action</th>
        </tr>
    </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $datos as $matricula)
        <tr class="odd">
            <td class=" "><b>{{ $matricula->id }}</b></td>
            <td class=" "><b>{{ Semestre::find($matricula->semestre)->nombre }}</b></td>
            <td class=" "><b>{{ $matricula->codAlumno }}</b></td>
            <td class=" "><b>{{ $matricula->alumno }}</b></td>
            <td class=" "><b>{{ $matricula->codCargaAcademica_ct }}</b></td>
            <td class=" "><b>{{ $matricula->nombre }}</b></td>
            <td class=" ">
                <span class="label label-danger">{{ HTML::link('matriculas_ct/delete/'.$matricula->id,'Eliminar') }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-2"><p><b>Pagina Actual:</b> {{ $datos->getCurrentPage()}}</p></div>
    <div class="col-sm-6">{{ $datos->links()}}</div>
</div>
@stop