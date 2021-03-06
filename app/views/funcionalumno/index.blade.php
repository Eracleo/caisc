@extends('layouts.base_alumno')
@section('title')
Buscar Matriculas para el semestre Seleccionado
@stop
@section('options')
@stop
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        {{ Form::open(array('method'=> 'POST','url'=> 'alumnoB/listarCargasDispo.html','class'=>'form-horizontal','role'=>'form')) }}
            <div class="form-group">
                {{ Form::label('semestre','Seleccione Semestre:',array('class'=>'col-sm-4 control-label')) }}
                <div class="col-sm-4">
                    {{ Form::select('semestre',$semestres,null,array('class'=>'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <button class="btn btn-primary btn-block" type="submit">Buscar Matriculas Disponibles</button>
                </div>
            </div>
        {{Form::close()}}    
    </div>
@stop