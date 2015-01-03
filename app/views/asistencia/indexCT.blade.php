@extends('layouts.base_docente')
@section('content')
<form action="ingresoCT" name="form1" method="post">
	<h1>Control de Asistencia Carrea Técnica</h1>
    <div class="form-group">
    	<label for="">Seleccione  Asignatura : </label>
	        <select name='id' id='id' onChange='document.form1.submit()'>
	        	<option value='0'>Seleccione Asignatura</option>;
	        	@foreach( $cursos as $curso)
					<option value='{{ $curso -> id }}'>{{ $curso -> nombre }}</option>;
			    @endforeach
	        </select>
    </div>
</form>
  
@stop

