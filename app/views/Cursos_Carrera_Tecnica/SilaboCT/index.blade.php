@extends('layouts.base_docente')
@section('title')
Lista <small>SILABO CURSOS DE CARRERA </small>
@stop
@section('options')
<li>{{HTML::linkAction('ListarCursosCTController@getIndex', 'Volver a mis cursos de Carrera')}} </li>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <div class="row">
            </div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th >Nro</th>
                        <th class="hidden">id</th>
                        <th >Capitulo</th>
                        <th >Titulo del Silabo</th>
                        <th>Estado</th>
                        <th >Actions</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
                @foreach( $datos as $dato)
                
                <tr class="odd">
                        <td class=""><b></b>{{$dato->orden}}</td>
                        <td class="hidden"><b>{{ $dato->id }}</b></td>
                        <td class=" "><b>{{ $dato->capitulo }}</b></td>
                        <td class=" ">{{ $dato->titulo }}</td>
                        <td class=" ">
                                    <?php if($dato->estado == 2 ) { ?> 
                                        <b> Finalizado</b>
                                    <?php }
                                    else{ ?> 
                                            <?php  if($dato->estado == 1 )
                                            {   ?> 
                                                <b>En Proceso</p>
                                            <?php 
                                            }   else{ ?> 
                                                <b>Inactivo</b>
                                        <?php } ?> <?php } ?> 
                        </td>
                        <td class=" ">
                           {{ HTML::link('SilaboCarreraTecnica/detalle/'.$dato->id,'Detalle',array('class'=>'col-sm-8 btn btn-success')) }}
                           <br><br>
                            {{ HTML::link('SilaboCarreraTecnica/updatecID/'.$dato->id,'Actualizar',array('class'=>'col-sm-4 btn btn-warning')) }}
                            {{ HTML::link('SilaboCarreraTecnica/post_delete/'.$dato->id,'Eliminar',array('class'=>'col-sm-4 btn btn-danger')) }}
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
                 Pagina Actual:{{ $datos->getCurrentPage()}}
            </div>
                {{ $datos->links()}}
    </div><!-- /.box-body -->
</div>
@stop
