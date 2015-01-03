@extends('layouts.base_admin')
@section('title')
Editar Personal <small> {{$personal->nombre}} </small>
@stop
@section('options')
<li>{{ HTML::link('personal/profile/'.$personal->id,'Perfil') }}</li>
<li>{{ HTML::link('personal/edit/'.$personal->id,'Editar') }}</li>
<li>{{ HTML::link('personal/password/'.$personal->id,'Cambiar Contraseña') }}</li>
@stop
@section('content')

<div class="ccol-xs-12 col-sm-12">
{{ Form::model($personal,array('url'=>array('personal/update',$personal->id),'method'=> 'POST','class'=>'form-horizontal','role'=>'form'))}}
	<div class="form-group">
		{{ Form::label('nombre','Nombre(s):',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre',$personal->nombre,array('class'=>'form-control','placeholder'=>'Juan'))}}
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
			{{ Form::text('apellidos',$personal->apellidos,array('class'=>'form-control','placeholder'=>'Huamani Mendoza'))}}
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
			{{ Form::text('direccion',$personal->direccion,array('class'=>'form-control','placeholder'=>'Av. la cultura Nro 8'))}}
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
			{{ Form::text('telefono',$personal->telefono,array('class'=>'form-control','placeholder'=>'12345678'))}}
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
		<div class="col-xs-12  col-md-3">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-md-3">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
