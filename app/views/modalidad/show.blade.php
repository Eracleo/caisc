@extends('layouts.base_admin')
@section('title')
Mantenimiento Modalidad
@stop
@section('options')
<li >{{ HTML::link('/modalidad','Todos') }}</li>
<li>{{ HTML::link('/modalidad/create','Nuevo') }}</li>
@stop
@section('content')

        @if (!empty($modalidad))
        <p>
          Nombre: <strong>{{ $modalidad->id }}</strong>
        </p>
        <p>
          Concepto: <strong>{{ $modalidad->descripcion }}</strong>
        </p>
        <p>
          Monto (S/.): <strong>{{ $modalidad->monto }}</strong>
        </p>
        @else
        <p>
          No existe información para ésta modalidad.
        </p>
        @endif
  @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
@stop
