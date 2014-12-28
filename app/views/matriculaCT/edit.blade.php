@extends('layouts.base_admin')
@section('title')
Editar Matricula
@stop
@section('options')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'matriculas_ct/update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('idt','Código Matricula:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('idt',$matricula->id,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('CodAlumno','Código Alumno:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('CodAlumno',$matricula->codAlumno,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('CodCargaAcad','Código Carga Académica:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('CodCargaAcad',$matricula->codCargaAcademica_ct,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-3 col-md-3">
			<a href="../../matriculas_ct/listaMatriculas">
	        	<button type="button" class="btn btn-primary">Cancelar</button>
	        </a>
	    </div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Modificar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop