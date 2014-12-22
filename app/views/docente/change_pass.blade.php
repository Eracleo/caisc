@extends('layouts.base_admin')
@section('title')
Cambiar Contraseña <small> {{$docente->nombre}} </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Docentes')}} </li>
<li>{{ HTML::link('docente/profile/'.$docente->id,$docente->nombre)}}</li>
<li>Editar</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::model($docente,array('method'=> 'POST','url'=>array('docente/update',$docente->id),'class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('apellidos','Password-Anterior:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::password('pAnterior',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password','Password:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::password('password',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password_confirmation','Confirme-Password:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::password('password_confirmation',array('class'=>'form-control'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('password'))
		       	@foreach ($errors->get('password') as $error)
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
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
