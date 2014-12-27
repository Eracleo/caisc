@extends('layouts.base_admin')
@section('title')
Lista de Grupos
@stop
@section('options')
	<li class="active todos"><i class="fa fa-fw fa-th-list"></i>Listar</li>
	<li class="nuevo"><i class="fa fa-fw fa-plus"></i>{{HTML::linkAction('GrupoController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
     <div class="col-sm-4">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr role="row">
                                <th>Grupo</th>
                                <th>Accion(Editar)</th>
                                <th>Accion(Eliminar)</th>
                            </tr>
                        </thead>
						@foreach($grupos as $grupo)
							<tr>
								<td align = "center">
									<a href="grupo/{{ $grupo->id }}">{{ $grupo->nombre }}</a>
								</td>
								<td  align = "center">
									<a href="grupo/{{ $grupo->id }}/edit"><span class="label label-success">Editar</a>
								</td>
								<td align = "center">
									{{ Form::open(array('url'=>'grupo/'.$grupo->id, 'method'=>'delete')) }}
									{{ Form::submit('Eliminar') }}
									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</table>
        </div>
@stop