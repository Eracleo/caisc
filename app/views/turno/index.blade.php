@extends('layouts.base_admin')
@section('title')
Lista de Turnos
@stop
@section('options')
	<li class="active todos"><i class="fa fa-fw fa-th-list"></i>Listar</li>
	<li class="nuevo"><i class="fa fa-fw fa-plus"></i>{{HTML::linkAction('TurnoController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
     <div class="col-sm-4">
        <table class="table table-bordered table-striped dataTable" >
            <thead>
                <tr role="row">
                    <th>Turno
                    </th>
                    <th
                    Accion(Editar)
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                        Accion(Eliminar)
                    </th>
                </tr>
            </thead>
			@foreach($turnos as $turno)
				<tr>
					<td align = "center">
						<a href="turno/{{ $turno->id }}">{{ $turno->nombre }}</a>
					</td>
					<td  align = "center">
						<a href="turno/{{ $turno->id }}/edit"><span class="label label-success">Editar</a>
					</td>
					<td align = "center">
						{{ Form::open(array('url'=>'turno/'.$turno->id, 'method'=>'delete')) }}
						{{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>
        </div>
@stop