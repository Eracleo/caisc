@extends('layouts.base_alumno')
@section('title')
Cursos Disponibles para matricularse
@stop
@section('options')
@stop
@section('content')
    <div class="box-header">
        <label>Lista de Cargas Academicas a los cuales se puede matricular el alumno</label><br>
</div>
<div class="box">
    {{ Form::open(array('method'=> 'POST','url'=> 'alumnoB/matricular_lista','class'=>'form-horizontal','role'=>'form')) }}
        {{ Form::label('codAlumno','Codigo Alumno: ',array('class'=>'col-sm-4 control-label')) }}
        <div class="col-sm-2">
            <input name="codAlumno" type="text" class="form-control" value="{{$alumno->id}}" readonly>
        </div>
        {{ Form::label('semestreMatri','Semestre: ',array('class'=>'col-sm-1 control-label')) }}
        <div class="col-sm-2">
            <input name="semestreMatri" type="text" class="form-control" value="{{$semest}}" readonly>
        </div>
        <div class="box-body table-responsive">
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Código Carga Academica</th>
                        <th colspan="1" rowspan="1">Semestre</th>
                        <th colspan="1" rowspan="1">Código Curso</th>
                        <th colspan="1" rowspan="1">Curso</th>
                        <th colspan="1" rowspan="1">Código Docente</th>
                        <th colspan="1" rowspan="1">Docente</th>
                        <th colspan="1" rowspan="1">turno</th>
                        <th colspan="1" rowspan="1">grupo</th>
                        <th colspan="1" rowspan="1">Accion</th>
                    </tr>
                </thead>
                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    @foreach( $cursos as $curso)
                    <tr class="odd">
                            <td class=" "><b>{{ $curso->codCargaAcademica_ct }}</b></td>
                            <td class=" "><b>{{ $curso->semestre}}</b></td>
                            <td class=" "><b>{{ $curso->codCurso_ct }}</b></td>
                            <td class=" "><b>{{ $curso->curso }}</b></td>
                            <td class=" ">{{ $curso->codDocente }}</td>
                            <td class=" ">{{ $curso->docente }}</td>
                            <td class=" ">{{ $curso->turno }}</td>
                            <td class=" ">{{ $curso->grupo }}</td>
                            <td class=" "><input type="checkbox" name="cargas[]" value={{ $curso->codCargaAcademica_ct }}></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <button class="btn btn-primary btn-block" type="submit">Matricular</button>
            </div>
        </div>
    {{Form::close()}}  
</div>
@stop