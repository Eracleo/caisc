@extends('layouts.base_docente')
@section('title')
Ingresar Notas
@stop
@section('breadcrumb')
<li>ALUMNOS</li>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_length" id="example1_length">
                        <label><select aria-controls="example1" size="1" name="example1_length">
                            <option selected="selected" value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> Filas que desea visualizar</label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Buscar: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('direccion','Buscar Alumno') }}
                    </div>
                </div>
            </div>

            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Cod Alumno</th>
                        <!--<th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Apellidos y Nombres</th>-->
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nota 1</th>
                        <th aria-label="Engine version: activate to sort column ascending" style="width: 163px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nota 2</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nota 3</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Promedio</th>
                    </tr>
                </thead>

                <tbody aria-relevant="all" aria-live="polite" role="alert">
                    <?php $i=1 ?>
                    @foreach($cursos as $alumno)
                        <tr class="odd">
                            <td class=" ">{{$alumno->codAlumno}}</td>
                            <td class=""><input type="text" value="{{$alumno->Nota1}}" name="nota1{{$i}}"></td>
                            <td class=""><input type="text" value="{{$alumno->Nota2}}" name="nota1{{$i}}"></td>
                            <td class=""><input type="text" value="{{$alumno->Nota3}}" name="nota1{{$i}}"></td>
                            <td class=" ">{{$alumno->Promedio}}</td>
                        <tr>
                        <?php $i++ ?>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
    <input type="number" value="{{$i}}" name="i">
    {{Form::submit('Guardar Notas')}}
</div>
@stop