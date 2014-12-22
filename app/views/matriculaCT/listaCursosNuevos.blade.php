@extends('layouts.base_admin')
@section('title')
Lista de Cursos Nuevos
@stop
@section('breadcrumb')
@stop
@section('content')
<style>
    span a{
        color: white;
    }
</style>
<div class="box-header">
        <p align="center"><h3 class="box-title"><b>Código Alumno:</b>{{ $cod }}</h3></p>
</div>
<div class="box">    
    <div class="box-body table-responsive">
        <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
            <thead>
                <tr role="row">
                    <th colspan="1" rowspan="1">cod carga academica</th>
                    <th colspan="1" rowspan="1">cod curso</th>
                    <th colspan="1" rowspan="1">docente id</th>
                    <th colspan="1" rowspan="1">Modulo</th>
                    <th colspan="1" rowspan="1">turno</th>
                    <th colspan="1" rowspan="1">grupo</th>
                    <th colspan="1" rowspan="1">Accion</th>
                </tr>
            </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $cursos as $curso)
                <tr class="odd">
                        <td class=" "><b>{{ $curso->codCargaAcademica_ct }}</b></td>
                        <td class=" "><b>{{ $curso->codCurso_ct }}</b></td>
                        <td class=" ">{{ $curso->docente_id }}</td>
                        <td class=" ">{{ $curso->semestre }}</td>
                        <td class=" ">{{ $curso->turno }}</td>
                        <td class=" ">{{ $curso->grupo }}</td>
                        <td class=" ">
                            <span class="label label-primary">{{ HTML::link('matriculas_cl/matricular/'.$curso->codCargaAcademica_ct,'matricular') }}</span>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop