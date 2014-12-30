@extends('layouts.base_docente')
@section('title')
Agregar <small> NUEVO SILABO </small>
@stop

@section('breadcrumb')
<li>{{ HTML::link('SilaboCarreraTecnica/index.html/','Silabo de Cursos de Carrera') }} </li>
<li>Agregar Silabo</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraTecnica/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
	<div class="col-sm-1">
		{{ Form::number('codCargaAcademica_ct',$id,array('class'=>'form-control','placeholder'=>'','required','readonly'=>'readonly'))}}
	</div></div>

	<div class="form-group">
		{{ Form::label('capitulo','Capitulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('capitulo','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('titulo','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

<div class="form-group">
		{{ Form::label('objetivos','Objetivos:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('objetivos','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('descripcion','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('numeroclases','Clases Requeridas :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('numeroclases','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('orden','Orden:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			@if(SilaboCursoTecnico::get()->last() == null)
				{{ Form::number('orden',1 ,array('class'=>'form-control','readonly'=>'readonly','required'))}}			
			@else
				{{ Form::number('orden',SilaboCursoTecnico::get()->last()->orden +1 ,array('class'=>'form-control','readonly'=>'readonly','required'))}}
			@endif
		</div>
	</div>
		
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
