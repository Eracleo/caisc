@extends('layouts.base_docente')
@section('title')
Eliminar <small>SILABO DE CARRERA TECNICA </small>
@stop
@section('options')
<li>{{ HTML::link('SilaboCarreraTecnica/index.html/','Silabo de Cursos de Carrera') }} </li>
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraTecnica/eliminar.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
	{{ Form::label('LABEL','ESTA SEGURO DE ELIMINAR ESTE SILABO:',array('class'=>'col-sm-6 control-label')) }}
	</div>

	<div class="form-group">
		{{ Form::hidden('id','Nro de Silabo:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-3">
			{{ Form::hidden('id',$silabocurso_ct->id,array('class'=>'form-control','readonly'=>'readonly'))}}
		</div>
	</div>

	
	<div class="form-group">
		{{ Form::label('capitulo','Capitulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('capitulo',$silabocurso_ct->capitulo,array('class'=>'form-control','placeholder'=>'capitulo 1','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('titulo',$silabocurso_ct->titulo,array('class'=>'form-control','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('objetivos','Objetivos:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('objetivos',$silabocurso_ct->objetivos,array('class'=>'form-control','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('descripcion',$silabocurso_ct->descripcion,array('class'=>'form-control','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('numeroclases','Clases requeridas :',array('class'=>'col-sm-2 control-label','readonly'=>'readonly')) }}
		<div class="col-sm-6">
			{{ Form::number('numeroclases',$silabocurso_ct->numeroclases,array('class'=>'form-control','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::hidden('orden','Orden :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::hidden('orden',$silabocurso_ct->orden,array('class'=>'form-control','required', 'readonly'=>'readonly'))}}
		</div>
	</div>
	
	
	<div class="form-group">
		
		<div class="form-group">
		
		<div class="col-xs-12 col-sm-8 col-md-4">
			{{HTML::linkAction('SilaboCarreraTecnicaController@listar', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
		</div>
	</div>
{{Form::close()}}
@stop