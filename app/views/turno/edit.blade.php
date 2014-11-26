@extends('layouts.base_admin')
@section('title')
MATENIMIENTO DE TURNO
@stop

@section('breadcrumb')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('TurnoController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('TurnoController@create', 'Nuevo')}}</li>
@stop
@section('content')
<div>
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
  <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="box">
            <div class="panel panel-success">
                <div class="panel-body" align="">
                    <div class="panel-default" align="center">
                        <h3 class="text-muted" align="center">Editar Turno {{ $turno -> nombre }}</h3>
                    </div>
                <section class="content">
                    <ul>
                  {{ Form::open(array('url' => 'turno/' . $turno->id, 'method' =>'put')) }}
                  {{ Form::text('nombre', $turno->nombre) }} <br/>
                  <br/>
                  {{ Form::submit('Modificar')}} 
                  &nbsp;&nbsp;&nbsp;&nbsp;
                            {{HTML::linkAction('TurnoController@index', 'Cancelar')}}
                  {{ Form::close()}} 
                    </ul>
                </section><!-- /.content -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop