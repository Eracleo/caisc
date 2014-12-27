@extends('layouts.base_admin')
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
		{{ Form::label('id','Esta seguro de eliminar este curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('id',$curso_ct->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('nombre',$curso_ct->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('modulo',Modulo::find($curso_ct->modulo)->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codCarrera','Carrera:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('codCarrera',Carrera::find($curso_ct->codCarrera)->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-info btn-block" type="return">
				<span class="">{{ HTML::link('CursosTecnica/index.html','Cancelar') }}</span>
				</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop