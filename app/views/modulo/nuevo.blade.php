@extends('layouts.base_admin')
@section('title')
Agregar Modulo
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ HTML::link('modulo','Volver a listar') }}
{{ Form::open(array('method'=> 'POST','url'=> 'modulo/crear')) }}

<div class="form-group">Identificador
{{Form::text('ID','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> Nombre:
{{Form::text('Nombre','',array('class'=>'form-control'))}}
</div>
<div class="form-group">
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="reset">Nuevo</button>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="reset">Listar</button>
	</div>
</div>
{{Form::close()}}
</div>
@stop
