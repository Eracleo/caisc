@extends('layouts.base_admin')
@section('title')
Semestre - Docente
@stop
@section('breadcrumb')
<li>Agregar</li>
@stop
@section('content')
<div class="row">
	{{ Form::open(array('url' => '/MostrarHorariosPorDocente','class'=>'form-horizontal','role'=>'form')) }}
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

		<div class="form-group">{{Form::label('lblSemestre','Semestre:',array('class'=>'col-sm-3 control-label lead'))}}
	    	<div class="col-sm-6">{{ Form::select('comboSemestre', $varElementosComboSemestre,null,array('class'=>'form-control','required')) }}</div>
	   	</div>

	  	<div class="form-group">{{Form::label('lblDocente','Docente:',array('class'=>'col-sm-3 control-label lead'))}}
	  		<div class="col-sm-6">
				<select name="nombreCompleto" class="form-control">
					@foreach($varElementosComboDocente as $docente)
						<option value="{{$docente->nombre}} {{$docente->apellidos}}"> {{$docente->nombre}} {{$docente->apellidos}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-6">{{Form::submit('Ver horarios',array('class'=>'btn btn-info btn-block'))}}</div>
		<div class="col-xs-12 col-sm-3 col-md-6">
		   			{{ HTML::link(URL::to('/crearCargaCt'), 'Regresar',array('class'=>'btn btn-info btn-block')) }}
		</div>
	</div>
	{{ Form::close()}}
</div>
@stop
























