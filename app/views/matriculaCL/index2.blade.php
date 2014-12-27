@extends('layouts.base_admin')
@section('title')
Lista de Matriculas por Curso Libre
@stop
@section('breadcrumb')
@stop
@section('content')
<style>
    span {
        margin: 5px;
    }
    span a{
        color: white;
    }
</style>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Código Matricula</th>
                        <th colspan="1" rowspan="1">Código Alumno</th>
                        <th colspan="1" rowspan="1">Nombre Alumno</th>
                        <th colspan="1" rowspan="1">Código Carga Academica</th>
                        <th colspan="1" rowspan="1">Nombre del Curso</th>
                        <th colspan="1" rowspan="1">Action</th>
                    </tr>
                </thead>
                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach( $matriculas as $matricula)
                    <tr class="odd">
                        <td class=" "><b>{{ $matricula->id }}</b></td>
                        <td class=" "><b>{{ $matricula->codigo }}</b></td>
                        <td class=" "><b>{{ $matricula->alumno }}</b></td>
                        <td class=" "><b>{{ $matricula->codCargaAcademica_cl }}</b></td>
                        <td class=" "><b>{{ $matricula->curso }}</b></td>
                        <td class=" ">
                            <span class="label label-warning">{{ HTML::link('matriculas_cl/edit/'.$matricula->id,'Modificar') }}</span>
                            <span class="label label-danger">{{ HTML::link('matriculas_cl/delete/'.$matricula->id,'Eliminar') }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
@stop