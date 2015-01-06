@extends('layouts.base_docente')
@section('title')
<small>Ingreso De Notas Curso De Carrera Tecnica</small>
@stop
@section('content')
<form action="ingresoCT" name="form1" method="post">
    <div class="form-group">
    	<label for="">Asignatura : </label>
	        <select name='id' id='id' onChange='document.form1.submit()'>
	        	<option value='0'>Seleccionar Asignatura</option>;
	        	@foreach( $cursos as $curso)
	        		@if( $id == $curso -> id)
						<option selected value='{{ $curso -> id }}'>{{ $curso -> nombre.' Turno: '.$curso -> turno.' '.$curso -> grupo }}</option>;
					@else
						<option value='{{ $curso -> id }}'>{{ $curso -> nombre.' Turno: '.$curso -> turno.' '.$curso -> grupo }}</option>;
					@endif
			    @endforeach
	        </select>
    </div>
</form>
{{ Form::open(array('url'=>'ingresonotas/ingresoNotaCT', 'method'=>'post')) }}
    <?php $idCurso = $id ?>
    <div class="form-group">
        {{ Form::label('curso','ID CURSO:',array('class'=>'col-sm-1 control-label')) }}
        <div class="col-sm-2 col-md-2">    
            <input name="idCurso" type="text" class="form-control" value="{{$idCurso}}" readonly>
        </div>
    </div>
    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    NRO°
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Código Alumno
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;">
                    Nombre y Apellidos
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nota1
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nota2
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                    Nota3
                </th>
            </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	<?php $i=1 ?>
			@foreach($alumnos as $alumno)
			<tr class="odd">
                <td class="">{{$i}} <input type="hidden" value="{{ $alumno->idNota }}" name="codMatricula{{$i}}" readonly="readonly"></td>
                <td class=" sorting_1" align="center">{{ $alumno->idAlumno }}</td>
                <td class="">{{ $alumno->NombreCpt }}</td>
                <td class=""><input type="number" name="nota1{{$i}}" value="{{$alumno->Nota1}}" min="0" max="20" step="1"  required="required"></td>
                <td class=""><input type="number" name="nota2{{$i}}" value="{{$alumno->Nota2}}" min="0" max="20" step="1"  required="required"></td>
                <td class=""><input type="number" name="nota3{{$i}}" value="{{$alumno->Nota3}}" min="0" max="20" step="1"  required="required"></td>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    <?php 
        if($i>1){
    ?>
    <label for="">Nro Total De Alumnos : </label> {{$i-1}}
    <input type="hidden" value="{{$i-1}}" name="i" readonly="readonly"><br><hr>
    {{Form::submit('Guardar Notas')}}
    <?php 
        }
    ?>
{{Form::close()}}
@stop