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

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
	<div class="panel" >
		<form method="post" action="search">
		 	<div class="row">
                <div class="form-inline">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder="" value= "0001" readonly>
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
            <label> Código:</label>
            <div class="form-inline"> 			   			
    			<input name="id_alumno" type="text" class="form-control" placeholder="Ingrese Codigo" requiered="true" value="" >
    			<button type="submit" class="btn btn-info btn-sm">
    				<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
    			</button>
                <span >{{ HTML::link('alumno/add.html','Agregar',array('class'=>'btn btn-warning')) }}</span>
    		</div>            
        </form>
        <p>
            <label>Nombres:</label>
            <input type="text" id="nombres" placeholder="" class="form-control" required value="" readonly="">
        </p>
  	    <p>
            <label>Apellidos:</label>
            <input type="text" id="apellidos" placeholder="" class="form-control" required value="" readonly="">
        </p>  
           
        <label> Modalidad:</label>
        <div class="form-inline">                       
            {{ Form::select('modalidad_id',$modalidad,null,array('class'=>'form-control'))}}               
            <input name="agrega_detil" type="button" onclick="agregar_detalle()" value="Agregar Detalle" class="btn btn-info" />
        </div>

        <table id="detalle_pago" class="table table-striped">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Concepto</th>
                    <th>Importe</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr id="rows">
                    <td id="nro"></td>
                    <td id="concepto"></td>
                    <td id="inport"></td>
                    <td>
                        <a href=""><span id="mostrar" class="label label-success"></span></a>
                        <a href=""><span id="editar" class="label label-info"></span></a>
                        <a onclick="eliminar_detalle()"><span id="eliminar" class="label label-danger"></span></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            <label>TOTAL:</label>
            <input type="text" name="total" class="form-control" id="total_pago" readonly>
        </p>

        <div class="form-group">
            <input type="submit" value="Guardar" class="btn btn-success">
            <!--<div class="col-xs-4 col-sm-3">
                <input type="submit" value="guardar" class="btn btn-success">
            </div>
            <div class="col-xs-12 col-sm-3">
                <button class="btn btn-primary" type="reset">Imprimir</button>
            </div>-->
        </div>

    </div>
	@if(Session::has('message'))
	<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</div>
@stop

<script type="text/javascript">
    function agregar_detalle(){
        var num="1";
        var inp = document.getElementById("modalidad_id").value;
        var concpt= "pago certificado";
        //var concpt= document.getElementById("modalidad_id");
        //var con = <?php echo "hola"; ?>
        nro.innerHTML=num;
        concepto.innerHTML=concpt;
        inport.innerHTML=inp;
        total_pago.value=inp;
        mostrar.innerHTML="Mostrar";
        editar.innerHTML="Editar";
        eliminar.innerHTML="Eliminar";
    }

    function eliminar_detalle(){
        nro.innerHTML="";
        concepto.innerHTML="";
        inport.innerHTML="";
        total_pago.value="";
        mostrar.innerHTML="";
        editar.innerHTML="";
        eliminar.innerHTML="";
    }
</script>