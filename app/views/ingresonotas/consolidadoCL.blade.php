@extends('layouts.base_admin')
@section('content')
<form action="consolidadoCL" name="form1" method="post">
    <div class="form-group">
        <label for="">Asignatura : </label>
            <select name='id' id='id' onChange='document.form1.submit()'>
                <option value='0'>Seleccionar Asignatura</option>;
                @foreach( $cursos as $curso)
                    @if( $id == $curso -> id)
                        <option selected value='{{ $curso -> id }}'>{{ $curso -> nombre }}</option>;
                    @else
                        <option value='{{ $curso -> id }}'>{{ $curso -> nombre }}</option>;
                    @endif
                @endforeach
            </select>
    </div>
</form>

<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
    <thead>
        <tr role="row">
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                NRO°
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                CodAlumno
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;">
                Nombre y Apellidos
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                Nota
            </th>
        </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
    	<?php $i=1 ?>
		@foreach($alumnos as $alumno)
		<tr class="odd">
            <td class="">{{ $i }}</td>
            <td class="">{{ $alumno->idAlumno }}</td>
            <td class="">{{ $alumno->NombreCpt }}</td>
            <td class="">{{$alumno->Nota}}</td>
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
</table>
@stop