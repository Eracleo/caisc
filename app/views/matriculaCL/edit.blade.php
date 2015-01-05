@extends('layouts.base_admin')
@section('title')
Editar Matricula
@stop
@section('options')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'matriculas_cl/update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('idt','Código Matricula:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			<input name="idt" type="text" class="form-control" value="{{$matricula->id}}" readonly>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('CodAlumno','Código Alumno:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			<input name="CodAlumno" type="text" class="form-control" value="{{$matricula->codAlumno}}" readonly>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('CodCargaAcad','Código Carga Académica:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('CodCargaAcad',$matricula->codCargaAcademica_cl,array('class'=>'form-control'))}}
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-xs-12 col-sm-3 col-md-3">
			<a href="../../matriculas_curso_libre">
	        	<button type="button" class="btn btn-primary">Cancelar</button>
	        </a>
	    </div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
