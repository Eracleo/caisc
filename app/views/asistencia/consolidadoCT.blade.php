@extends('layouts.base_docente')
@section('title')
Control de Asistencia Carrea Técnica
@stop
@section('content')
<form action="consolidadoCT" name="form1" method="post">
    <div class="form-group">
        <label for="">Seleccione Asignatura : </label>
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

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
    $(function () {
    $("#fecha").datepicker();
    });
    </script>
    </head>
    <body>
    <label for="fecha">Fecha:
     <input name="Fecha" type="text" id="fecha" value="" />
    </label>
    </body>

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
             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;">
               Asistencia
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
            <td align='center'>Asistío</td>
            
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
</table>
@stop