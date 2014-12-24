@extends('layouts.base_admin')
@section('title')
Registro de Matricula Carrera Tecnica
@stop
@section('breadcrumb')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'matriculas_ct/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('codAlumno','Codigo Alumno:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codAlumno','',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codCargaAcademica_ct','Codigo Carga Academica:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codCargaAcademica_ct',$curso->codCargaAcademica_ct,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-3 col-md-3">
			<a href="../../matriculas_ct/registro">
	        	<button type="button" class="btn btn-primary">Cancelar</button>
	        </a>
	    </div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop