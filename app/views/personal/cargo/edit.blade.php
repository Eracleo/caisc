@extends('layouts.base_'.Str::lower(Auth::user()->tipoUsuario))
@section('title')
{{$cargo->nombre}} <small> Editar Cargo   </small>
@stop
@section('options')
<li>{{ HTML::link('personal','Personal')}} </li>
<li>{{ HTML::link('personal/cargos','Listar Cargos')}} </li>
<li>{{ HTML::link('personal/cargos/add.html','Nuevo Cargos')}} </li>
@stop
@section('content')
<div class="ccol-xs-12 col-sm-12">
{{ Form::model($cargo,array('url'=>array('personal/cargo/update',$cargo->id),'method'=> 'POST','class'=>'form-horizontal','role'=>'form'))}}
		<div class="form-group">
		{{ Form::label('nombre','Nombre(s):',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre',$cargo->nombre,array('class'=>'form-control','placeholder'=>'Administrador'))}}
		</div>
		<div class="errores">
				@if ( $errors->has('nombre'))
		       	@foreach ($errors->get('nombre') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('privilegios','Privilegios:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('privilegios',$cargo->privilegios,array('class'=>'form-control','placeholder'=>'General'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('privilegios'))
		       	@foreach ($errors->get('privilegios') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('descripcion',$cargo->descripcion,array('class'=>'form-control','placeholder'=>'xxx'))}}
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
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
