@extends('layouts.base_admin')
@section('title')
Horario por curso <small> CARGA ACADEMICA</small>
@stop
@section('breadcrumb')
@stop
@section('content')
	{{ Form::open(array('url' => '/mostrarHorariosPorCurso','class'=>'form-horizontal','role'=>'form')) }}
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

		<div class="form-group">{{Form::label('lblSemestre','Semestre:',array('class'=>'col-sm-3 control-label lead'))}}
	    	<div class="col-sm-6">{{ Form::select('comboSemestres', $varElementosComboSemestre,null,array('class'=>'form-control','required')) }}</div>
	   	</div>

	   	<div class="form-group">{{Form::label('lblCurso','Curso:',array('class'=>'col-sm-3 control-label lead'))}}
	    	<div class="col-sm-6">{{ Form::select('comboCursos', $varElementosComboCodCurso_ct,null,array('class'=>'form-control','required')) }}</div>
	   	</div>

		<div class="col-xs-12 col-sm-3 col-md-6">{{Form::submit('Ver horarios',array('class'=>'btn btn-info btn-block'))}}</div>
		<div class="col-xs-12 col-sm-3 col-md-6">
		   			{{ HTML::link(URL::to('/crearCargaCt'), 'Regresar',array('class'=>'btn btn-info btn-block')) }}
		</div>
	<div>
</div>
	{{ Form::close()}}
@stop