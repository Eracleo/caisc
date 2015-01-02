@extends('layouts.base_docente')
@section('title')
DETALLE <small>SILABO</small>
@stop

@section('options')

<li>{{ HTML::link('SilaboCarreraTecnica/index.html/','Ver Silabos de Cursos de Carrera') }} </li>
<li>{{ HTML::link('SilaboCarreraTecnica/updatecID/'.$silabo->id,'Editar') }}</li>
<li>{{ HTML::link('SilaboCarreraTecnica/post_delete/'.$silabo->id,'Eliminar') }}</li>

@stop

@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraTecnica/end.html','class'=>'form-horizontal','role'=>'form')) }}

<div class="row">
	<div class="col-lg-7">
		{{ Form::hidden('id',$silabo->id,array('class'=>'form-control col-sm-2','required','readonly'=>'readonly'))}}	
	</div>	
	<br>	
	
	{{Form::close()}}	
	<div class="col-lg-4">	

		<p><b>NRO 		:	</b> {{ $silabo->orden }}</p>
		<p ><b>CAPITULO		:	</b>{{ $silabo->capitulo }}</p>
		<p><b>NUMERO DE CLASES 	:	</b> {{ $silabo->numeroclases}}</p>
		
		<?php 
			if($silabo->estado == 2 )
			{
		?> 
				<p><b>ESTADO:</b> Finalizado</p>
		<?php 
			}
			else{
		?> 
					<?php 
					if($silabo->estado == 1 )
					{
				?> 
						<p><b>ESTADO:</b> En Proceso</p>
				<?php 
					}
					else{
				?> 
						<p><b>ESTADO:</b> Inactivo</p>
				<?php 
					}
				?>
		<?php 
			}
		?> 
		@if($silabo->estado == 1)
			<button class="col-sm-8 btn btn-success" type="submit">Finalizar</span>
		@else
			<button class="col-sm-8 btn btn-danger" type="submit">En Proceso</span>
		@endif
	</div>
	<div class="col-lg-7">
		<p ><b>TITULO 	: 	</b>{{ $silabo->titulo }}</p>
		<p ><b>OBJETIVOS 	:	</b></br> {{ $silabo->objetivos }}</p>
		<p><b>DESCRIPCION 	:	</b></br> {{ $silabo->descripcion }}  </p>
		
		
	</div>
</div>
@stop