@extends('layouts.base_admin')
@section('title')
Lista <small>CURSOS DE CARRERA  </small>
@stop
@section('options')
<li>{{HTML::link('CursosTecnica/index.html','Listar')}}</li>
<li>{{HTML::link('CursosTecnica/create.html','Nuevo')}}</li>
@stop
@section('content')

{{ Form::open(array('method'=> 'GET','url'=> 'CursosTecnica/listarAmbos.html','class'=>'form-horizontal','role'=>'form')) }}

    <div class= "form-group">
        {{ Form::label('buscar','Buscar por Carrera:',array('class'=>'col-sm-2 control-label')) }}
        
        <div class="col-sm-6 col-md-3">
            @if($carrera == null)
                {{HTML::linkAction('CarreraProfesionalController@add', 'Necesita agregar carrera','',array('class'=>'btn btn-warning','required'))}}
            @else
                {{ Form::select('codCarrera',$carrera,null,array('class'=>'form-control','required'))}}    
            @endif            
        </div>        
        <div class="errores">
            @if ( $errors->has('codCarrera'))
                @foreach ($errors->get('codCarrera') as $error)
                <div class="alert alert-danger">* {{ $error }}</div>
                @endforeach
            @endif
        </div>
     </div>

     <div class="form-group">
        {{ Form::label('modulo','Buscar por Modulo:',array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-6 col-md-3">
            @if($modulo == null)
                {{HTML::linkAction('ModuloController@create', 'Necesita agregar modulo','',array('class'=>'btn btn-warning'))}}
            @else
                {{ Form::select('modulo',$modulo,null,array('class'=>'form-control','required'))}}
            @endif
        </div>
        <div class="errores">
            @if ( $errors->has('modulo'))
                @foreach ($errors->get('modulo') as $error)
                <div class="alert alert-danger">* {{ $error }}</div>
                @endforeach
            @endif
        </div>
        <div class="col-xs-12 col-sm-2">
            <button class="btn btn-primary btn-block" type="submit">Buscar</button>
        </div>
    </div>
{{Form::close()}}


  <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">

                <th>Codigo Curso</th>
                <th>Nombre del Curso</th>
                <th>Modulo</th>
                <th>Horas Acad.</th>
                <th>Carrera</th>
                <th>Actions</th>
            </tr>
        </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $datos as $dato)
        <tr class="odd">
                <td class=" "><b>{{ $dato->id }}</b></td>
                <td class=" ">{{ $dato->nombre }}</td>
                <td class=" ">{{ Modulo::find($dato->modulo)->nombre }}</td>
                <td class=" ">{{ $dato->horas_academicas }}</td>
                <td class=" ">{{ Carrera::find($dato->codCarrera)->nombre }}</td>
                <td class=" ">
                  <!--  {{HTML::linkAction('CursosCarreraTecnicaController@ActualizarConID', 'Actualizar','',array('class'=>'btn btn-success','required'))}}
                  -->  <span class="label label-success">{{ HTML::link('CursosTecnica/updatecID/'.$dato->id,'Actualizar') }}</span>
                    <span class="label label-danger">{{ HTML::link('CursosTecnica/post_delete/'.$dato->id,'Eliminar') }}</span>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
     Pagina Actual:{{ $datos->getCurrentPage()}}
    {{ $datos->links()}}
@stop
