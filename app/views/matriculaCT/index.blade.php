@extends('layouts.base_admin')
@section('title')
Buscar Registros disponibles para matrícula
@stop
@section('options')
@stop
@section('content')
<style>
    #formulario {
        float: none;
        width: 60%; 
    }
</style>
<div id='formulario' class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <p>Ingrese Código del Alumno para buscar matrículas disponibles en el semestre seleccionado</p>
    {{ Form::open(array('method'=> 'POST','url'=> 'matriculas_ct/listaMatricula.html','class'=>'form-horizontal','role'=>'form')) }}
        <div class="form-group">
            {{ Form::label('codAlumno','Ingrese Codigo Alumno:',array('class'=>'col-sm-4 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('codAlumno','',array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('semestre','Seleccione Semestre:',array('class'=>'col-sm-4 control-label')) }}
            <div class="col-sm-4">
                {{ Form::select('semestre',$semestres,null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <button class="btn btn-primary btn-block" type="submit">Buscar Matrículas Disponibles</button>
            </div>
        </div>
    {{Form::close()}}    
</div>
@stop