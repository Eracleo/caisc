@extends('layouts.base_admin')
@section('title')
Lista de Alumnos
@stop
@section('options')
@stop
@section('content')
<style>
    span {
        margin: 5px;
    }
    span a{
        color: white;
    }
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="col-xs-12 col-sm-12">
        {{ Form::open(array('method'=> 'POST','url'=> 'alumnosXcarrera','class'=>'form-horizontal','role'=>'form')) }}
        <div class="form-group">
            <label class = 'col-sm-2 control-label'>Carrera : </label>
            <div class="col-sm-6 col-md-4">
                <select name='codCarrera' id='codCarrera'>
                    <option >Seleccionar Carrera</option>;
                    @foreach( $carreras as $carrera)
                        <option value='{{ $carrera->id }}'>{{ $carrera->nombre }}</option>;
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-2">
                <button class="btn btn-primary btn-block" type="submit">Buscar</button>
            </div>
        </div>
        {{Form::close()}}
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Cod Alumno</th>
                        <th colspan="1" rowspan="1">Apellidos y Nombres</th>
                        <th colspan="1" rowspan="1">Carrera Tecnica</th>
                        <th colspan="1" rowspan="1">DNI</th>
                        <th colspan="1" rowspan="1">Estado</th>
                        <th colspan="1" rowspan="1">Acciones</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $datos as $dato)
                <tr class="odd">
                        <td class=" ">{{ $dato->id }}</td>
                        <td class=" "><b>{{ $dato->apellidos }}</b> {{ $dato->nombre }}</td>
                        <td class=" ">{{ $dato->carr }}</td>
                        <td class=" ">{{ $dato->dni }}</td>

                        <?php 
                            if($dato->estado == 0 ){
                        ?> 
                                <td class=" ">Inactivo</td>
                        <?php 
                            }
                            else{
                        ?> 
                                <td class=" ">Activo</td>
                        <?php 
                            }
                        ?>
                        <td class=" ">
                            <span class="label label-success">{{ HTML::link('alumno/edit/'.$dato->id,' Modificar ') }}</span>
                            <span class="label label-warning">{{ HTML::link('alumno/profile/'.$dato->id,' Detalles ') }}</span>
                            <span class="label label-danger">{{ HTML::link('alumno/deshabilitar/'.$dato->id,' Deshabilitar') }}</span>
                            <span class="label label-primary">{{ HTML::link('alumno/habilitar/'.$dato->id,' Habilitar') }}</span>
                            <span class="label label-primary">{{ HTML::link('alumno/change-pass/'.$dato->id,' Cambiar Contraseña') }}</span>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div><!-- /.box-body -->
</div>
@stop
