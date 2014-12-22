@extends('layouts.base_admin')
@section('title')
<h3>Alumno: <b>{{$alumno->nombre, ' ',$alumno->apellidos}}</b></h3>
@stop
@section('breadcrumb')
<li>{{$alumno->nombre}}</li>
@stop
@section('content')
<style>
    span a{
        color: white;
    }
</style>
<div class="box-header">
        <p align="center"><h3 class="box-title">Código Alumno: {{$alumno->id}}</h3></p>
</div>
<div class="col-xs-12 col-sm-12">
        {{ Form::open(array('url'=> '','class'=>'form-horizontal','role'=>'form')) }}
            <div class="box-body table-responsive">
                <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr role="row">
                            <th colspan="1" rowspan="1">cod carga academica</th>
                            <th colspan="1" rowspan="1">cod curso</th>
                            <th colspan="1" rowspan="1">docente id</th>
                            <th colspan="1" rowspan="1">modulo</th>
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
                                <td class=" ">{{ $curso->modulo }}</td>
                                <td class=" ">{{ $curso->turno }}</td>
                                <td class=" ">{{ $curso->grupo }}</td>
                                <td><input type="checkbox" name="codigs[]" value"{{ $curso->codCargaAcademica_ct }}">{{ $curso->codCargaAcademica_ct }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit">Matricular</button>
            </div>
        {{Form::close()}}
    </div>
<div class="box">    
    
</div>
@stop