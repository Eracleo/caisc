@extends('layouts.base_docente')
@section('title')
Actualizar <small> SILABO </small>
@stop

@section('options')
<li>{{ HTML::link('SilaboCarreraTecnica/index.html/','Ver Silabos de Cursos Libres') }} </li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraTecnica/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::hidden('id',$silabocurso_ct->id,array('class'=>'form-control','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('capitulo','Capitulo :',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('capitulo',$silabocurso_ct->capitulo,array('class'=>'form-control','placeholder'=>''))}}
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
			{{ Form::text('titulo',$silabocurso_ct->titulo,array('class'=>'form-control','placeholder'=>''))}}
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
			{{ Form::textarea('objetivos',$silabocurso_ct->objetivos,array('class'=>'form-control','placeholder'=>''))}}
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
			{{ Form::textarea('descripcion',$silabocurso_ct->descripcion,array('class'=>'form-control','placeholder'=>''))}}
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
			{{ Form::number('numeroclases',$silabocurso_ct->numeroclases,array('class'=>'form-control','placeholder'=>''))}}
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
			@if(SilaboCursoTecnico::get()->last() == null)
				{{ Form::hidden('orden',1 ,array('class'=>'form-control','readonly'=>'readonly'))}}			
			@else
				{{ Form::hidden('orden',SilaboCursoTecnico::get()->last()->orden,array('class'=>'form-control','readonly'=>'readonly'))}}
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
			{{HTML::linkAction('SilaboCarreraTecnicaController@listar', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-8 col-md-5">
			<button class="btn btn-primary btn-block" type="submit"> Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
