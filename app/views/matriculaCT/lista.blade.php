@extends('layouts.base_admin')
@section('title')
Lista de Matriculas Anteriores
@stop
@section('options')
@stop
@section('content')
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Codigo Matricula CT</th>
                        <th colspan="1" rowspan="1">Codigo Alumno</th>
                        <th colspan="1" rowspan="1">Codigo Carga Academica</th>
                        <th colspan="1" rowspan="1">Modulo</th>
                    </tr>
                </thead>
                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach( $matriculas as $matricula)
                    <tr class="odd">
                            <td class=" "><b>{{ $matricula->id }}</b></td>
                            <td class=" "><b>{{ $matricula->codAlumno }}</b></td>
                            <td class=" ">{{ $matricula->codCargaAcademica_ct }}</td>
                            <td class=" ">{{ Modulo::find($matricula->modulo)->nombre }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <p> </p>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            {{ Form::open(array('method'=> 'POST','url'=> 'matriculas_ct/listaCursosNuevos.html','class'=>'form-horizontal','role'=>'form')) }}
                <div class="form-group">
                    {{ Form::label('codAlumno','Codigo Alumno:',array('class'=>'col-sm-4 control-label')) }}
                    <div class="col-sm-4">
                        {{ Form::text('codAlumno','',array('class'=>'form-control'))}}
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Consultar Cursos</button>
                    </div>
                </div>
            {{Form::close()}}
        </div>
@stop