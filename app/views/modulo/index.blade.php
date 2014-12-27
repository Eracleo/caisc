@extends('layouts.base_admin')
@section('title')
MODULO
@stop
@section('options')
	<li><a href="#">Listar</a></li>
	<li>{{HTML::linkAction('ModuloController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
        <thead>
            <tr role="row">
                <th>Modulo</th>
                <th>Accion(Editar)</th>
                <th>Accion(Eliminar)</th>
            </tr>
        </thead>
		@foreach($modulos as $modulo)
			<tr>
				<td align = "center">
					<a href="modulo/{{ $modulo->id }}">{{ $modulo->nombre }}</a>
				</td>
				<td  align = "center">
					<a href="modulo/{{ $modulo->id }}/edit"><span class="label label-success">Editar</a>
				</td>
				<td align = "center">
					{{ Form::open(array('url'=>'modulo/'.$modulo->id, 'method'=>'delete')) }}
					{{ Form::submit('Eliminar') }}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
@stop