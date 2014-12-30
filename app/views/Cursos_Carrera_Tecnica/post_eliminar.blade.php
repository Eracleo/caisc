@extends('layouts.base_admin')
@section('title')
Eliminar <small>CURSOS TECNICOS </small>
@stop
@section('options')
<li>{{HTML::link('CursosTecnica/index.html','Listar')}}</li>
<li>{{HTML::link('CursosTecnica/create.html','Nuevo')}}</li>
<li><a href="#">Eliminar Curso</a></li>
@stop

<style>
    span {
        margin: 5px;
    }
    span a{
        color: white;
    }
</style>


@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'CursosTecnica/eliminar.html','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
			{{ Form::label('id','ESTA SEGURO DE ELIMINAR ESTE CURSO:',array('class'=>'col-sm-4 control-label')) }}
		</div>
<div class="form-group">
		{{ Form::label('id','Codigo del Curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('id',$curso_ct->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('nombre',$curso_ct->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('modulo',Modulo::find($curso_ct->modulo)->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codCarrera','Carrera:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('codCarrera',Carrera::find($curso_ct->codCarrera)->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			{{HTML::linkAction('CursosCarreraTecnicaController@listar', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}

		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop
