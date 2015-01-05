@extends('layouts.base_admin')
@section('title')
Editar Modalidad
@stop
@section('options')
<li >{{ HTML::link('/modalidad','Todos') }}</li>
<li>{{ HTML::link('/modalidad/create','Nuevo') }}</li>
@stop
@section('content')
  <div class="panel frm-sm">
        @if (!empty($modalidad))
          <form method="post" action="{{ url('modalidad/update',$modalidad->id) }}">

          <p>
            <label>Nombre:</label>
            <input value="{{ $modalidad->id }}" type="text" name="id" placeholder="Nombre" class="form-control" required>
          </p>
          <p>
            <label>Concepto:</label>
            <input value="{{ $modalidad->descripcion }}" type="text" name="descripcion" placeholder="Concepto" class="form-control" required>
          </p>
           <p>
            <label>Monto (S/.)</label>
            <input value="{{ $modalidad->monto }}" type="text" name="monto" placeholder="Monto" class="form-control" required>
          </p>
          <input type="submit" value="Guardar" class="btn btn-primary">
          @else
          <p>
            No existe información para éste usuario.
          </p>
        @endif

        
      </form>
  </div>

  @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
@stop
