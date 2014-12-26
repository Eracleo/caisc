@extends('layouts.base_admin')
@section('title')
Lista de Cursos Libres
@stop
@section('breadcrumb')
@stop
@section('content')
<style>
    span a{
        color: white;
    }
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Código Carga Academica</th>
                        <th colspan="1" rowspan="1">Código Curso</th>
                        <th colspan="1" rowspan="1">Nombre Curso</th>
                        <th colspan="1" rowspan="1">Código Docente</th>
                        <th colspan="1" rowspan="1">Nombre Docente</th>
                        <th colspan="1" rowspan="1">Turno</th>
                        <th colspan="1" rowspan="1">Grupo</th>
                        <th colspan="1" rowspan="1">Acciones</th>
                    </tr>
                </thead>
                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach( $cursos as $curso)
                    <tr class="odd">
                        <td class=" ">{{ $curso->codCargaAcademica_cl }}</td>
                        <td class=" ">{{ $curso->codCurso_cl }}</td>
                        <td class=" ">{{ $curso->nom_curso}}</td>
                        <td class=" ">{{ $curso->docente_id }}</td>
                        <td class=" ">{{ $curso->nom_docente }}</td>
                        <td class=" ">{{ $curso->turno }}</td>
                        <td class=" ">{{ $curso->grupo }}</td>
                        <td class=" ">
                            <span class="label label-primary">{{ HTML::link('matriculas_cl/registrar/'.$curso->codCargaAcademica_cl,'Matricular') }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div><!-- /.box-body -->
@stop