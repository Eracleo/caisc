@extends('layouts.base_admin')
@section('title')
Editar Modalidad
@stop
@section('options')
<li >{{ HTML::link('/modalidad','Todos') }}</li>
<li>{{ HTML::link('/modalidad/create','Nuevo') }}</li>
@stop
@section('content')
        @if (!empty($modalidad))
        <div class="col-xs-12 col-sm-12">
            <form method="post" action="{{ url('modalidad/update',$modalidad->id) }}" class='form-horizontal' role='form'>
                <div class="form-group">
                    {{ Form::label('id','Nombre(s):',array('class'=>'col-sm-1 control-label')) }}
                    <div class="col-sm-6 col-md-4">
                        <input value="{{ $modalidad->id }}" type="text" name="id" class="form-control" readonly>
                    </div>
                    <div class="errores">
                        @if ( $errors->has('id'))
                            @foreach ($errors->get('id') as $error)
                            <div class="alert alert-danger">* {{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                        {{ Form::label('descripcion','Concepto:',array('class'=>'col-sm-1 control-label')) }}
                    <div class="col-sm-6 col-md-4">
                        <input value="{{ $modalidad->descripcion }}" type="text" name="descripcion" class="form-control">
                    </div>
                    <div class ="errores">
                        @if ( $errors->has('descripcion'))
                            @foreach ($errors->get('descripcion') as $error)
                            <div class="alert alert-danger">* {{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>  

                <div class="form-group">
                        {{ Form::label('monto','Monto(S/.):',array('class'=>'col-sm-1 control-label')) }}
                    <div class="col-sm-6 col-md-4">
                        <input value="{{ $modalidad->monto }}" type="text" name="monto" placeholder="Monto" class="form-control">
                    </div>
                    <div class ="errores">
                    @if ( $errors->has('monto'))
                        @foreach ($errors->get('monto') as $error)
                        <div class="alert alert-danger">* {{ $error }}</div>
                        @endforeach
                    @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        @endif

  @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
 
@stop
