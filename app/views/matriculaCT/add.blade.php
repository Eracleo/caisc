@extends('layouts.base_admin')
@section('title')
Registrar Matricula <small> NUEVA MATRICULA </small>
@stop
@section('options')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'matriculas_ct/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('idt','Código Matricula:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('idt','',array('class'=>'form-control','placeholder'=>'1'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codAlumno','Codigo Alumno:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codAlumno','',array('class'=>'form-control','placeholder'=>'ALU001'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codCargaAcademica_ct','Codigo Carga Academica:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codCargaAcademica_ct','',array('class'=>'form-control','placeholder'=>'CA-CT01'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('modulo','Módulo :',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::select('modulo',$modulos,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Limpiar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop