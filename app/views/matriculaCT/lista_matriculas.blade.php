@extends('layouts.base_admin')
@section('title')
Relacion de Matriculas Carrera Técnica
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
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Código Matricula</th>
                        <th colspan="1" rowspan="1">Código Alumno</th>
                        <th colspan="1" rowspan="1">Código Carga Academica</th>
                        <th colspan="1" rowspan="1">Action</th>
                    </tr>
                </thead>
                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach( $datos as $matricula)
                    <tr class="odd">
                        <td class=" "><b>{{ $matricula->id }}</b></td>
                        <td class=" "><b>{{ $matricula->codAlumno }}</b></td>
                        <td class=" ">{{ $matricula->codCargaAcademica_ct }}</td>
                        <td class=" ">
                            <span class="label label-warning">{{ HTML::link('matriculas_ct/edit/'.$matricula->id,'Modificar') }}</span>
                            <span class="label label-danger">{{ HTML::link('matriculas_ct/delete/'.$matricula->id,'Eliminar') }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            Pagina Actual:{{ $datos->getCurrentPage()}}
            </div>
            {{ $datos->links()}}
        </div>
        <p></p>
    </div><!-- /.box-body -->
</div>
@stop