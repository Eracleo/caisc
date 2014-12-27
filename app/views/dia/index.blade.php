@extends('layouts.base_admin')
@section('title')
Lista de Dias
@stop
@section('options')
	<li class="active todos"><i class="fa fa-fw fa-th-list"></i>Listar</li>
	<li class="nuevo"><i class="fa fa-fw fa-plus"></i>{{HTML::linkAction('DiaController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
     <div class="col-sm-4">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr role="row">
                                <th>Dia</th>
                                <th>Accion(Editar)</th>
                                <th>Accion(Eliminar)</th>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
							@foreach($dias as $dia)
							<tr class="odd">
                                <td class=" sorting_1" align="center"><a href="dia/{{ $dia->id }}">{{ $dia->nombre }}</a>  </td>
                                <td class="" align="center"><a href="dia/{{ $dia->id }}/edit"><span class="label label-success">Editar</a></td>
                                <td class=" " align="center">
                                    {{ Form::open(array('url'=>'dia/'.$dia->id, 'method'=>'delete')) }}
                                    {{ Form::submit('Eliminar') }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop