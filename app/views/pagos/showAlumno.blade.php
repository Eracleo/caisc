@extends('layouts.base_admin')
@section('title')
Caja y Facturación
@stop
@section('options')
<!--<li >{{ HTML::link('/alumno','Todos') }}</li>
<li>{{ HTML::link('/alumno/create','Nuevo') }}</li>-->
@stop
@section('content')

<?php
    $date = Date("Y-m-d")
?>


<form method="post" action="store">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <div class="panel" >
        
            <div class="row">
                <div class="form-inline">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder="" value= {{ $pago + 1 }} readonly>
                    </div>
                    <div class="col-xs-3">
                        <input  name="nro_serie" type="text" class="form-control" placeholder="" value="0001" readonly>
                    </div>
                    <div class="col-xs-3">
                        <input name="fecha" type="text" class="form-control" placeholder="" value=<?php echo $date?> readonly>
                    </div>
                </div>
            </div>
            <br>
            <div>
                @if (!empty($alumno))
                    <p>
                        <label>Codigo:</label>
                        <input name="id_alumno" type="text"  value="{{ $alumno->id}}" class="form-control" readonly>
                    </p>
                    <p>
                        <label>Nombres:</label>
                        <input type="text" name="nombres" value="{{ $alumno->nombre}}" class="form-control" readonly>
                    </p>
                    <p>
                        <label>Apellidos:</label>
                        <input type="text" name="apellidos" value="{{ $alumno->apellidos}}" class="form-control" readonly>
                    </p>
                @else
                    <p>
                        No existe información para ésta modalidad.
                    </p>
                @endif
            </div>

            <label> Modalidad:</label>
            <div class="form-inline">                       
                <select id="opciones" class="form-control">
                    @foreach($modalidad as $mod)
                        <option value="{{ $mod->monto }},{{ $mod->id }},{{ $mod->descripcion }}" >{{ $mod->id }}</option>
                    @endforeach
                </select>
                   
                <input name="agrega_detil" type="button" onclick="agregar_detalle()" value="Agregar Detalle" class="btn btn-info" />
            </div>            
    </div>
</div>
<div id = "my_table" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <table id="detalle_pago" class="table table-striped">
        <thead>
            <tr>
                <th><label>Nro</label></th>
                <th><label>Modalidad</label></th>
                <th><label>Concepto</label></th>
                <th><label>Importe</label></th>                
                <th><label>Acciones</label></th>
            </tr>
        </thead>
        <tbody>
            <tr id="rows">
                <td><input type="text" name="numero" class="form-control" id="nro" readonly="readonly"></td>
                <td><input type="text" name="modalidad" class="form-control" id="id_modalidad" readonly="readonly"></td>
                <td><input type="text" name="concepto" class="form-control" id="concepto" readonly="readonly"></td>
                <td><input type="text" name="import" class="form-control" id="inport" readonly="readonly"></td>                
                <td>
                    <a onclick="eliminar_detalle()"><span id="eliminar" class="label label-danger"></span></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <p>
        <label>TOTAL (S/.):</label>
        <input type="text" name="total" class="form-control" id="total_pago" readonly>
    </p>

    <div class="form-group">
        <input type="submit" value="Guardar" class="btn btn-success">

        <!--<div class="col-xs-12 col-sm-3">
            <button class="btn btn-primary" type="reset">Imprimir</button>
        </div>-->
    </div>
</div>
<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <input  id = "full" type="text" name="full" class="form-control" id="total_pago" readonly >
</div>-->

</form>
    
@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
@endif

@stop

<script type="text/javascript">

    document.getElementById('full').style.display='none';
    var k = 0;
    full.value = k;
    function agregar_detalle(){
        var str = opciones.value;
        var data = str.split(",");
        nro.value="1";
        concepto.value=data[2];
        inport.value=data[0];
        id_modalidad.value=data[1];
        total_pago.value=data[0];
        eliminar.innerHTML="Eliminar";
        k+=1;
        full.value = k.toString();
    }


    function eliminar_detalle(){
        nro.value="";
        concepto.value="";
        inport.value="";
        total_pago.value="";
        id_modalidad.value="";
        eliminar.innerHTML="";
        k-=1;
        full.value = k.toString();
    }

    function genera_tabla() {
        // Obtener la referencia del elemento body
        var body = document.getElementById("my_table");
         
        // Crea un elemento <table> y un elemento <tbody>
        var tabla   = document.getElementById("detalle_pago");
        var tblBody = document.createElement("tbody");
     
        // Crea las celdas
        for (var i = 0; i < 2; i++) {
            // Crea las hileras de la tabla
            var hilera = document.createElement("tr");
     
            for (var j = 0; j < 2; j++) {
                // Crea un elemento <td> y un nodo de texto, haz que el nodo de
                // texto sea el contenido de <td>, ubica el elemento <td> al final
                // de la hilera de la tabla
                var celda = document.createElement("td");
                var textoCelda = document.createTextNode("celda en la hilera "+i+", columna "+j);
                celda.appendChild(textoCelda);
                hilera.appendChild(celda);
            }
     
            // agrega la hilera al final de la tabla (al final del elemento tblbody)
            tblBody.appendChild(hilera);
        }
     
        // posiciona el <tbody> debajo del elemento <table>
        tabla.appendChild(tblBody);
        // appends <table> into <body>
        body.appendChild(tabla);
        // modifica el atributo "border" de la tabla y lo fija a "2";
        tabla.setAttribute("border", "2");
    }
</script>              