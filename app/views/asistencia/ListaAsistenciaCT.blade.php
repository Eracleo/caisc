@extends('layouts.base_admin')
@section('content')

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
     <input name="Fecha" type="text" id="fecha" value="" />
    </label>
    </body>
        


    <label for="">Tema : </label> 
    <input type="text"  name="Tema"  >
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