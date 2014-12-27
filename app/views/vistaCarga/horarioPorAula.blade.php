@extends('layouts.base_admin')
@section('title')
@stop
@section('content')
	{{ Form::open(array('url' => '/mostrarHorariosPorAula','class'=>'form-horizontal','role'=>'form')) }}
	<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
	@if ($elementosHorario)
	<div class="table-responsive" >
		<table class="table table-bordered table-hover">
		 <thead>
            <tr class="success" >
                <th>Horario</th>
                <th>Aula-101</th>
                <th>Aula-102</th>
                <th>Aula-103</th>
                <th>Aula-104</th>
                <th>Aula-105</th>
                <th>Aula-106</th>
                <th>Aula-107</th>
                <th>Aula-108</th>
                <th>Aula-109</th>
                <th>Aula-110</th>
            </tr>
        </thead>
			@foreach ($elementosHorario as $user)
			<tr>
				<td>{{($user->horario);}}</td>
				<td>{{($user->Aula101);}}</td>
				<td>{{($user->Aula102);}}</td>
				<td>{{($user->Aula103);}}</td>
				<td>{{($user->Aula104);}}</td>
				<td>{{($user->Aula105);}}</td>
				<td>{{($user->Aula106);}}</td>
				<td>{{($user->Aula107);}}</td>
				<td>{{($user->Aula108);}}</td>
				<td>{{($user->Aula109);}}</td>
				<td>{{($user->Aula110);}}</td>
			</tr>
			@endforeach
		</table>
	</div>
		@else
		   <p> No hay usuarios cargados </p>
		@endif
@stop