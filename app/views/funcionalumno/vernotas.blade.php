@extends('layouts.base_alumno')
@section('title')
Notas del Alumno
@stop
@section('content')
<form action="notascursos" name="form1" method="post">
    <div class="form-group">
    	<label for="">Semestre : </label>
	        <select name='id' id='id' onChange='document.form1.submit()'>
	        	<option value='0'>Seleccionar Semestre</option>;
	        	@foreach( $elementosComboSemestre as $semestre)
					<option value='{{ $semestre -> id }}'>{{ $semestre -> nombre }}</option>;
			    @endforeach
	        </select>
    </div>
</form>
    <div class="form-group">
        <label for="">Seleccionar Un Semestre </label>
    </div>
@stop