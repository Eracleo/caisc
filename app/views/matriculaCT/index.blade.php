@extends('layouts.base_admin')
@section('title')
Registrar Matricula
@stop
@section('breadcrumb')
<li>Matriculas</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    {{ Form::open(array('method'=> 'POST','url'=> 'matriculas_ct/listaMatricula.html','class'=>'form-horizontal','role'=>'form')) }}
        <div class="form-group">
            {{ Form::label('codAlumno','Ingrese Codigo Alumno:',array('class'=>'col-sm-4 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('codAlumno','',array('class'=>'form-control'))}}
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