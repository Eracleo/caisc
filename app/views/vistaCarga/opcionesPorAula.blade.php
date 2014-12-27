@extends('layouts.base_admin')
@section('title')
@stop
@section('options')
@stop
@section('content')
	{{ Form::open(array('url' => '/mostrarHorariosPorAula','class'=>'form-horizontal','role'=>'form')) }}
	<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			{{Form::label('lblSemestre','Semestre:',array('class'=>'col-sm-3 control-label lead'))}}
	    	<div class="col-sm-6">
	    	{{ Form::select('comboSemestres', $varElementosComboSemestre,null,array('class'=>'form-control','required')) }}
	    	</div>
	    </div>
	    <div class="form-group">
	    	{{Form::label('lblDia','Dia:',array('class'=>'col-sm-3 control-label lead'))}}
			<div class="col-sm-6">{{Form::select('comboDias', array('lunes' => 'lunes',
																    'martes' => 'martes',
																    'miercoles'=>'miercoles',
																    'jueves'=>'jueves',
																    'viernes'=>'viernes',
																    'sabado'=>'sabado'),
																	    null,array('class'=>'form-control','required'))}}
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-6">
			{{Form::submit('Ver horarios',array('class'=>'btn btn-info btn-block'))}}
		</div>
		<div class="col-xs-12 col-sm-3 col-md-6">
		   			{{ HTML::link(URL::to('/crearCargaCt'), 'Regresar',array('class'=>'btn btn-info btn-block')) }}
		</div>
	</div>
	</div>
	{{ Form::close()}}
@stop