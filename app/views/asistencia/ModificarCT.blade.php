extends('layouts.base_admin')
@section('content')
<form action="ModificarCT" name="form1" method="post">
    <h1>Control de Asistencia carrera Técnica  - (Modificación)</h1>
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
{{ Form::open(array('url'=>'asistencia/ModificarAsistenciaCT', 'method'=>'post')) }}
    <label for="">ID CURSO : </label>
    <?php $idCurso = $id ?>
    <input type="text" value="{{ $idCurso }}" name="idCurso" readonly="readonly"><br>

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
     <input name="Fecha" type="date" id="fecha" />
    </label>
    </body>
        

        <?php
      $myCalendar = new tc_calendar("date5", true, false);
      $myCalendar->setIcon("calendar/images/iconCalendar.gif");
      $myCalendar->setDate(date('d'), date('m'), date('Y'));
      $myCalendar->setPath("calendar/");
      $myCalendar->setYearInterval(2000, 2015);
      $myCalendar->dateAllow('2008-05-13', '2015-03-01');
      $myCalendar->setDateFormat('j F Y');
      $myCalendar->setAlignment('left', 'bottom');
      $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
      $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
      $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
      $myCalendar->writeScript();
      ?>
    

    <label for="">Tema : </label> 
    <input type="text"  name="Tema"  >
     <label for="">Observacion : </label> 
    <input type="text"  name="observacion"  >
    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
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
                <td class="">{{$i}}</td>
				<td class=" sorting_1" align="center">{{ $alumno->idAlumno }} </td>
                <td class="">{{ $alumno->NombreCpt }}</td>
                <td class="">         
                    <input type="checkbox" value="{{$i}}" name="Asistio{{$i}}">
                    <input type="hidden" value="{{$alumno->idAlumno}}" name="cod{{$i}}">
                </td>
                
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    <?php 
        if($i>1){
    ?>
    <label for="">Nro Total De Alumnos : </label>
    <input type="number" value="{{$i-1}}" name="i" readonly="readonly"><br><hr>
    {{Form::submit('Guardar Asistencia')}}
    <?php 
        }
    ?>
{{Form::close()}}
@stop