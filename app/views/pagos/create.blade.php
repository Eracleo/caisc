@extends('layouts.base_admin')
@section('title')
Caja y Facturación
@stop
@section('content')
<?php
    $date = Date("Y-m-d")
?>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li >{{ HTML::link('/pagos','Todos') }}</li>
        			<li>{{ HTML::link('/pagos/create','Nuevo') }}</li>
        		</ul>
        	</div>
        </div>
    </nav>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
  		<div class="panel-body" >
  			<form method="post" action="search">

  			<div class="well carousel-search hidden-sm">
			 	<div class="form-inline">
	  				<p>
				  	<div class="col-xs-3">
				    	<input type="text" class="form-control" placeholder="" value="N° 0001" disabled>
				  	</div>

					<div class="col-xs-3">
						<input type="text" class="form-control" placeholder="" value="Serie: 0001" disabled>
					</div>

				  	<div class="col-xs-3">

				  		<input name="fecha" type="text" class="form-control" placeholder="" value=<?php echo $date?> disabled>		  	

				  	</div>
					

				  	</p>
				</div>
			</div>

			<br>

			<p>
				<label>Código:</label>
				<div class="form-inline">			  	
				  	<div class="form-group">

				    	<input name="id_alumno" type="text" class="form-control" placeholder="Ingrese Codigo" requiered="true" value="" >
				  	</div>
				  
					<button type="submit" class="btn btn-default btn-sm">
					  	<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
					</button>

					<button type="button" class="btn btn-default btn-sm">
              <span >{{ HTML::link('alumno/add.html','Agregar') }}</span>
					</button>

				</div>

			</p>

			</form>

		 <p>
        <label>Nombres:</label>

        <input type="text" id="nombres" placeholder="" class="form-control" required value="">
      	</p>
      	<p>
        <label>Apellidos:</label>
        <input type="text" id="apellidos" placeholder="" class="form-control" required value="">
      	</p>	
		<div class="form-group">
              {{ Form::label('modalidad_id','Modalidad de Pago :',array('class'=>'col-sm-5 control-label')) }}
              <div class="col-sm-6 col-md-4">
              {{ Form::select('modalidad_id',$modalidad,null,array('class'=>'form-control'))}}
              </div>
              <script type="text/javascript">
              function agregar_detalle()
              {

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
            </script>
            <script type="text/javascript">
              function eliminar_detalle()
              {
                nro.innerHTML="";
                concepto.innerHTML="";
                inport.innerHTML="";
                total_pago.value="";
                mostrar.innerHTML="";
                editar.innerHTML="";
                eliminar.innerHTML="";
              }
            </script>
            <input name="agrega_detil" type="button" onclick="agregar_detalle()" value="agregar detalle" class="btn btn-info" />
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

	</div>
		@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
	</div>
@stop
