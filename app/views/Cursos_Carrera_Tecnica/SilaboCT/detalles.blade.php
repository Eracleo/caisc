@extends('layouts.base_admin')
@section('title')
DETALLE <small>SILABO</small>
@stop
@section('breadcrumb')
<li>{{$silabo->id}}</li>
@section('content')
<div class="row">
	<div class="col-lg-3">
		<p>{{ HTML::link('SilaboCarreraTecnica/updatecID/'.$silabo->id,'Editar') }} {{ HTML::link('SilaboCarreraTecnica/post_delete/'.$silabo->id,'Eliminar') }}</p>
		
		<p ><b>Nro de Silabo 	:	</b>{{ $silabo->id }}</p>
		<p ><b>capitulo 		:	</b>{{ $silabo->capitulo }}</p>
		
		<p align="center"><b>titulo 	: 	</b>{{ $silabo->titulo }}</p>
		
	</div>
	<div class="col-lg-7">
		
		<p ><b>objetivos 	:	</b></br> {{ $silabo->objetivos }}</p>
		<p><b>Descripcion 	:	</b></br> {{ $silabo->descripcion }}  </p>
		<p><b>numeroclases 	:	</b> {{ $silabo->numeroclases}}</p>
		<p><b>Orden 		:	</b> {{ $silabo->orden }}</p>
		<?php 
			if($silabo->estado == 2 )
			{
		?> 
				<p><b>Estado:</b> Finalizado</p>
		<?php 
			}
			else{
		?> 
					<?php 
					if($silabo->estado == 1 )
					{
				?> 
						<p><b>Estado:</b> En Proceso</p>
				<?php 
					}
					else{
				?> 
						<p><b>Estado:</b> Inactivo</p>
				<?php 
					}
				?>
		<?php 
			}
		?> 


	</div>
</div>
@stop