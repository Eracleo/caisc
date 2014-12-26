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
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_length" id="example1_length">
                        <label><select aria-controls="example1" size="1" name="example1_length">
                            <option selected="selected" value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> records per page</label>
                    </div>
                </div>
            </div>
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
            </div>
        </div>
    </div><!-- /.box-body -->
@stop