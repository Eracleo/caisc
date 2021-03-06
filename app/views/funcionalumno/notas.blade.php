@extends('layouts.base_alumno')
@section('misNotas')
<li class="active"><a href="inicionotascursos">Mis Notas</a></li>
@stop
@section('title')
Notas del Alumno
@stop
@section('title')
Notas del Alumno
@stop
@section('content')
<form action="notascursos" name="form1" method="post">
    <div class="form-group">
    	<label for="">Asignatura : </label>
	        <select name='id' id='id' onChange='document.form1.submit()'>
	        	<option value='0'>Seleccionar Semestre</option>
	        	@foreach( $elementosComboSemestre as $semestre)
                    @if( $idCurso == $semestre -> id)
                        <option selected value='{{ $semestre -> id }}'>{{ $semestre -> nombre }}</option>
                     @else
                        <option value='{{ $semestre -> id }}'>{{ $semestre -> nombre }}</option>
                    @endif
                @endforeach
	        </select>
    </div>
</form>
    <div class="form-group">
        <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    NRO°
                </th>
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Codigo de Curso
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nombre de Curso
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nota 1
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nota 2
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nota 3
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 10px;">
                    PROMEDIO
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Observaciones
                </th>
            </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	<?php $i=1 ?>
			@foreach($cursos as $curso)
			<tr class="odd">
                <td class="">{{$i}}</td>
				<td class="">{{$curso->codCurso}}</td>
				<td class="">{{$curso->nombre}}</td>
                <td class="">{{$curso->nota1}}</td>
                <td class="">{{$curso->nota2}}</td>
                <td class="">{{$curso->nota3}}</td>
                <?php $promedio = ($curso->nota1 + $curso->nota2 + $curso->nota3)/3; ?>
                <td class="">{{round($promedio)}}</td>
                 @if( $promedio > 10.5)
                    <td class="">APROBADO</td>
                @else
                    <td class="">DESAPROBADO</td>
                @endif
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    </div>
@stop