@extends('layouts.base_admin')
@section('title')
Crear Carga Academica<small> CARRERA TECNICA</small>
@stop
@section('options')
<li>{{HTML::link('crearCargaCt','Listar') }}</li>
<li>{{HTML::link('crearCargaCt','Nuevo') }}</li>
<li>{{HTML::link('MostrarOpcionesPorAula','Verificar Horarios') }}</li>
@stop
@section('content')
    <section id="formularioCarga" role="form">
        {{ Form::open(array('url' => '/recogerDatos','class'=>'form-horizontal','role'=>'form')) }}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group">{{Form::label('lblSemestre','Semestre',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbSemestre', $varElementosComboSemestre,null,array('class'=>'form-control','required'))}}</div>
            </div>
            <div class="form-group">{{Form::label('lblCurso','Curso:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbCursos', $varElementosComboCodCurso_ct,null,array('class'=>'form-control','required')) }}</div>
            </div>

            <div class="form-group">{{Form::label('lblDocente','Docente:',array('class'=>'col-sm-3 control-label lead'))}}
                <div class="col-sm-6">{{ Form::select('cmbDocentes', $varElementosComboCodDocente,null,array('class'=>'form-control','required')) }}</div>
            </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group">{{Form::label('lblAula','Aula:',array('class'=>'col-sm-3 control-label lead'))}}
                <div  class="col-sm-8">{{ Form::select('cmbAulas', $varElementosComboCodAula,null,array('class'=>'form-control','required'))}}</div>
            </div>

            <div class="form-group">{{Form::label('lblTurno','Turno:',array('class'=>'col-sm-3 control-label lead'))}}
                <div  class="col-sm-8">{{ Form::select('cmbTurnos', $varElementosComboTurno,null,array('class'=>'form-control','required')) }}</div>
            </div>

            <div class="form-group">{{Form::label('lblGrupo','Grupo:',array('class'=>'col-sm-3 control-label lead'))}}
                <div  class="col-sm-8">{{ Form::select('cmbGrupos', $varElementosComboGrupo,null,array('class'=>'form-control','required')) }}</div>
            </div>
    </div>

            <div class="table-responsive">
                <table  class="table table-bordered table-hover">
                    <thead>
                        <tr class="info">
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
                        </td>
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
            </div>

        <div class="col-xs-12 col-sm-3 col-md-3">{{Form::submit('Registrar',array('class'=>'btn btn-info btn-block'))}}</div>
        {{ Form::close() }}
        <div class="col-xs-12 col-sm-3 col-md-3">{{ HTML::link(URL::to('/MostrarOpcionesPorAula'), 'Verificar Horarios',array('class'=>'btn btn-info btn-block')) }}</div>
    </section>
@stop

