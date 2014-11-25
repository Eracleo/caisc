@extends('layouts.base_admin')
@section('title')
Agregar Matricula <small> NUEVO MATRICULA </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('matriculas','Matriculas')}} </li>
<li>Agregar</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'matriculas/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('codMatricula_ct','Código Matricula:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codMatricula_ct','',array('class'=>'form-control','placeholder'=>'MAT_CT-001'))}}
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
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('modulo','',array('class'=>'form-control','placeholder'=>'MOD001'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
