@extends('layouts.base_admin')
@section('title')
Caja y Facturación
@stop
@section('options')
<li >{{ HTML::link('/alumno','Todos') }}</li>
<li>{{ HTML::link('/alumno/create','Nuevo') }}</li>
@stop
@section('content')

<?php
    $date = Date("Y-m-d")
?>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="panel-body" >
        <form method="post" action="store">
          <div class="row">
            <div class="form-inline">
                <div class="col-xs-3">
                    <input type="text" class="form-control" placeholder="" value= {{ $pago + 1 }} >
                </div>
                <div class="col-xs-3">
                    <input  name="nro_serie" type="text" class="form-control" placeholder="" value="0001">
                </div>
                <div class="col-xs-3">
                    <input name="fecha" type="text" class="form-control" placeholder="" value=<?php echo $date?> >
                </div>
              </div>
          </div>
      <br>
        <div>
       @if (!empty($alumno))
        <p>
        <label>Codigo:</label>

         <input name="id_alumno" type="text"  value="{{ $alumno->id}}" class="form-control" >
        </p>
        <p>
        <label>Nombres:</label>
        <input type="text" name="nombres" value="{{ $alumno->nombre}}" class="form-control" required>
        </p>
        <p>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="{{ $alumno->apellidos}}" class="form-control" required>
        </p>
        @else
        <p>
          No existe información para ésta modalidad.
        </p>
        @endif
        </div>

        <div class="form-group">
        <div class="col-sm-10 col-md-9">
          <label>Seleccione Modalidad de Pago</label>
          <select id="opciones">
            @foreach($modalidad as $mod)
            <option value="{{ $mod->monto }},{{ $mod->id }},{{ $mod->descripcion }}">{{ $mod->id }}</option>
            @endforeach
          </select>
        </div>
             <script type="text/javascript">
              function agregar_detalle()
              {
                var str = opciones.value;
                var data = str.split(",");
                nro.value="1";
                concepto.value=data[2];
                inport.value=data[0];
                id_modalidad.value=data[1];
                total_pago.value=data[0];
                eliminar.innerHTML="Eliminar";

              }
            </script>
            <script type="text/javascript">
              function eliminar_detalle()
              {
                nro.value="";
                concepto.value="";
                inport.value="";
                total_pago.value="";
                id_modalidad.value="";
                eliminar.innerHTML="";
              }
            </script>
            <input name="agrega_detil" type="button" onclick="agregar_detalle()" value="agregar detalle" class="btn btn-info"/>
        </div>
        </div>
    <table id="detalle_pago" class="table table-striped">
        <thead>
          <tr>
            <th>NRO</th>
            <th>CONCEPTO</th>
            <th>IMPORTE</th>
            <th>MODALIDAD</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody>
            <tr id="rows">
              <td><input type="text" name="numero" class="form-control" id="nro" readonly="readonly"></td>
              <td><input type="text" name="concepto" class="form-control" id="concepto" readonly="readonly"></td>
              <td><input type="text" name="import" class="form-control" id="inport" readonly="readonly"></td>
              <td><input type="text" name="modalidad" class="form-control" id="id_modalidad" readonly="readonly"></td>
              <td>
                <a onclick="eliminar_detalle()"><span id="eliminar" class="label label-danger"></span></a>
              </td>
            </tr>
        </tbody>
    </table>
     <p>
        <label>TOTAL:</label>
        <input type="text" name="total" class="form-control" id="total_pago">
        </p>
      </table>

      <div class="form-group">
        <div class="col-xs-12 col-sm-3">
            <input type="submit" value="guardar" class="btn btn-success">
        </div>
        <div class="col-xs-12 col-sm-3">
          <button class="btn btn-primary" type="reset">Imprimir</button>
        </div>

    </div>

      </form>
    </div>
    @if(Session::has('message'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
  </div>
@stop
