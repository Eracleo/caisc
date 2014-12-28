@extends('layouts.base_admin')
@section('title')
Matricula Cursos Libres
@stop
@section('options')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'matriculas_cl/listarMatriculas.html','class'=>'form-horizontal','role'=>'form')) }}
    <div class="form-group">
        <label class = 'col-sm-3 control-label'>Curso Libre : </label>
        <div class="col-sm-6 col-md-4">
            <select name='codigo' id='codigo'>
                <option>Seleccionar Curso</option>;
                @foreach( $cursos as $curso)
                    <option value='{{ $curso->codCargaAcademica_cl }}'>{{ $curso->nombre }}</option>;
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <button class="btn btn-primary btn-block" type="submit">Buscar</button>
        </div>
    </div>
{{Form::close()}}
</div>
@stop