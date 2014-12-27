@extends('layouts.base_admin')
@section('title')
Crear Carga Academica <small>  CURSO LIBRE </small>
@stop
@section('options')
@stop
@section('content')
<html>
<head>
    <title>Crear carga cl</title>
</head>
<body>
    <section id="formularioCarga" role="form">
        @if(Session::has('mensaje'))
        <div class="alert-box success">
           <p> <strong> {{ Session::get('mensaje') }} </strong> </p>
        </div>
        @endif
        {{ Form::open(array('url' => '/recogerDatosCl','class'=>'form-horizontal','role'=>'form')) }}
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

            <div class="form-group">{{Form::label('lblCodCurso','Curso',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbCodCursos', $varElementosComboCursos,null,array('class'=>'form-control','required'))}}</div>
            </div>

            <div class="form-group">{{Form::label('lblIdDocente','Docente:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbIdDocentes', $varElementosComboIdDocentes,null,array('class'=>'form-control','required')) }}</div>
            </div>

            <div class="form-group">{{Form::label('lblTurno','Turno:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbTurnos', $varElementosComboTurnos,null,array('class'=>'form-control','required')) }}</div>
            </div>

            <div class="form-group">{{Form::label('lblGrupo','Grupo:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbGrupos', $varElementosComboGrupos,null,array('class'=>'form-control','required'))}}</div>
            </div>

            <div  class="form-group">{{Form::label('lblSemestre','Semestre:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbSemestres', $varElementosComboSemestres,null,array('class'=>'form-control','required')) }}</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div  class="form-group">{{Form::label('lblAula','Aula:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbAulas', $varElementosComboCodAula,null,array('class'=>'form-control','required'))}}</div>
            </div>
            <div  class="form-group">{{Form::label('lblFechaInicio','Fecha Inicio:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6"><input  class = "form-control " type="date" name="txtFechaInicio" name="FechaInicio"></div>
            </div>

            <div  class="form-group">{{Form::label('lblFechaFin','Fecha Fin:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6"><input  class = "form-control " type="date" name="txtFechaFin" name="FechaFin"></div>
            </div>

            <div  class="form-group">{{Form::label('lblEstado','Estado:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{Form::select('cmbEstado', array('0' => '0', '1' => '1'),null,array('class'=>'form-control','required'))}}</div>
            </div>

            <div  class="form-group">{{Form::label('lblMinimo','Minimo:',array('class'=>'col-sm-3 control-label lead'))}}
                <div  class="col-sm-6">{{Form::text('txtMinimo',null,array('class'=>'form-control','required'))}}</div>
            </div>
         </div>
         </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="warning">
                            <th>Hora</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sabado</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>
                            07:00-08:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '07:00-08:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '07:00-08:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '07:00-08:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '07:00-08:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '07:00-08:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '07:00-08:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            08:30-10:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '08:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '08:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '08:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '08:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '08:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '08:30-10:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                       10:00-11:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '10:00-11:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            11:30-13:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '11:30-13:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            13:00-14:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '13:00-14:30', false);}}
                        </td    >
                        <td>
                            {{Form::radio('rbHorariosViernes', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '13:00-14:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            14:30-16:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '14:30-16:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            16:00-17:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '16:00-17:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            17:30-19:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '17:30-19:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            19:00-20:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '19:00-20:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            20:30-22:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '20:30-22:00', false);}}
                        </td>
                    </tr>
                </table>

        <div class="col-xs-12 col-sm-3 col-md-3">{{Form::submit('Registrar',array('class'=>'btn btn-info btn-block'))}}</div>
        {{ Form::close() }}

        <div class="col-xs-12 col-sm-3 col-md-3">{{ HTML::link(URL::to('/MostrarOpcionesPorAula'), 'Verificar Horarios',array('class'=>'btn btn-info btn-block')) }}</div>

    </section>

@stop

