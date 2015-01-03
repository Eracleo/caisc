@extends('layouts.base_docente')
@section('title')
Agregar <small> NUEVO SILABO </small>
@stop

@section('options')
<li>{{ HTML::link('SilaboCarreraLibre/index.html/','Ver Silabos de Cursos Libres') }} </li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraLibre/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
	<div class="col-sm-8">
		{{ Form::hidden('codCargaAcademica_cl',$id,array('class'=>'form-control','placeholder'=>'','required','readonly'=>'readonly'))}}
	</div></div>

	<div class="form-group">
		{{ Form::label('capitulo','Capitulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('capitulo','',array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('capitulo'))
		       	@foreach ($errors->get('capitulo') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('titulo','',array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('titulo'))
		       	@foreach ($errors->get('titulo') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
			{{ Form::label('objetivos','Objetivos:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('objetivos','',array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('objetivos'))
		       	@foreach ($errors->get('objetivos') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
			{{ Form::label('descripcion','Descripcion :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('descripcion','',array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('descripcion'))
		       	@foreach ($errors->get('descripcion') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('numeroclases','Clases requeridas :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('numeroclases','',array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('numeroclases'))
		       	@foreach ($errors->get('numeroclases') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::hidden('orden','Orden :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			@if(SilaboCursoLibre::get()->last() == null)
				{{ Form::hidden('orden',1 ,array('class'=>'form-control','readonly'=>'readonly'))}}			
			@else
				{{ Form::hidden('orden',SilaboCursoLibre::get()->last()->orden +1 ,array('class'=>'form-control','readonly'=>'readonly'))}}
			@endif
		</div>
			<div class="errores">
			@if ( $errors->has('orden'))
		       	@foreach ($errors->get('orden') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
		
	<div class="form-group">
		<div class="col-xs-12 col-sm-8 col-md-5">
			{{HTML::linkAction('ListarCursosController@getIndex', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-5">
			<button class="btn btn-primary btn-block" type="submit"> Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
