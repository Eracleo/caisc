@extends('layouts.base_alumno')
@section('title')
Perfil del Alumno
@stop
@section('options')
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::model($alumno,array('url'=>array('alumno/update',$alumno->id),'method'=> 'POST','class'=>'form-horizontal','role'=>'form'))}}
    <div class="form-group">
        {{ Form::label('nombre','Nombre(s):',array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-6 col-md-4">
            <input name="nombre" type="text" class="form-control" value="{{$alumno->nombre}}" readonly>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellidos','Apellidos:',array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-6 col-md-4">    
            <input name="apellidos" type="text" class="form-control" value="{{$alumno->apellidos}}" readonly>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('telefono','Teléfono:',array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-6 col-md-4">
            {{ Form::text('telefono',$alumno->telefono,array('class'=>'form-control'))}}
        </div>
        <div class="errores">
            @if ( $errors->has('telefono'))
                @foreach ($errors->get('telefono') as $error)
                <div class="alert alert-danger">* {{ $error }}</div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('email','E-mail:',array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-6 col-md-4">
            {{ Form::email('email',$alumno->email,array('class'=>'form-control'))}}
        </div>
        <div class="errores">
            @if ( $errors->has('email'))
                @foreach ($errors->get('email') as $error)
                <div class="alert alert-danger">* {{ $error }}</div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-sm-3">
            <button class="btn btn-info btn-block" type="reset">Cancelar</button>
        </div>
        <div class="col-xs-12 col-sm-3">
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
        </div>
    </div>
{{Form::close()}}
</div>
@stop