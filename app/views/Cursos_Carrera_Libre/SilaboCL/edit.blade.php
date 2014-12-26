@extends('layouts.base_admin')
@section('title')
Actualizar <small> SILABO </small>
@stop

@section('breadcrumb')
<li>{{ HTML::link('SilaboCarreraLibre/index.html/','Silabo de Cursos Libres') }} </li>
<li>Actualizar Silabo</li>
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
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraLibre/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
		<div class="col-sm-1">
			{{ Form::text('id',$silabocurso_cl->id,array('class'=>'form-control','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('capitulo','Capitulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('capitulo',$silabocurso_cl->capitulo,array('class'=>'form-control','placeholder'=>'capitulo 1','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('titulo',$silabocurso_cl->titulo,array('class'=>'form-control','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('objetivos','Objetivos:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('objetivos',$silabocurso_cl->objetivos,array('class'=>'form-control','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('descripcion',$silabocurso_cl->descripcion,array('class'=>'form-control','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('numeroclases','Clases requeridas :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('numeroclases',$silabocurso_cl->numeroclases,array('class'=>'form-control','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('orden','Orden :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('orden',$silabocurso_cl->orden,array('class'=>'form-control','required', 'readonly'=>'readonly'))}}
		</div>
	</div>
	
	
	<div class="form-group">
		
		<div class="col-xs-12 col-sm-6 col-md-5">
		
		<button class="btn btn-info btn-block" type="reset">
				<span class="">{{ HTML::link('SilaboCarreraLibre/index.html','Cancelar') }}</span>
		</button>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
