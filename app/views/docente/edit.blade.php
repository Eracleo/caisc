@extends('layouts.base_'.Str::lower(Auth::user()->tipoUsuario))
@section('title')
{{$docente->nombre}} {{$docente->apellidos }}<small> Editar Docente   </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('docente/profile/'.$docente->id,'Perfil') }}</li>
<li class="active">{{ HTML::link('docente/edit/'.$docente->id,'Editar') }}</li>
<li>{{ HTML::link('docente/password/'.$docente->id,'Cambiar Contraseña') }}</li>
@stop
@section('content')
<div class="ccol-xs-12 col-sm-12">

{{ Form::model($docente,array('url'=>array('docente/update',$docente->id),'method'=> 'POST','class'=>'form-horizontal','role'=>'form'))}}
		<div class="form-group">
		{{ Form::label('nombre','Nombre(s):',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre',$docente->nombre,array('class'=>'form-control','placeholder'=>'Juan'))}}
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
		{{ Form::label('apellidos','Apellidos:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('apellidos',$docente->apellidos,array('class'=>'form-control','placeholder'=>'Huamani Mendoza'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('apellidos'))
		       	@foreach ($errors->get('apellidos') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('direccion','Dirección:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('direccion',$docente->direccion,array('class'=>'form-control','placeholder'=>'Av. la cultura Nro 8'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('direccion'))
		       	@foreach ($errors->get('direccion') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>

	</div>
	<div class="form-group">
		{{ Form::label('telefono','Teléfono:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('telefono',$docente->telefono,array('class'=>'form-control','placeholder'=>'12345678'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('telefono'))
		       	@foreach ($errors->get('telefono') as $error)
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
