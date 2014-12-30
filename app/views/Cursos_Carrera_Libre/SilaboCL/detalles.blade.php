@extends('layouts.base_docente')
@section('title')
DETALLE <small>SILABO</small>
@stop

@section('options')

<li>{{ HTML::link('SilaboCarreraLibre/index.html/','Silabo de Cursos Libres') }} </li>
<li>Detalle Silabo</li>
<li>{{$silabo->id}}</li>
<li>{{ HTML::link('SilaboCarreraLibre/updatecID/'.$silabo->id,'Editar') }}</li>
<li>{{ HTML::link('SilaboCarreraLibre/post_delete/'.$silabo->id,'Eliminar') }}</li>
<li>
		@if($silabo->estado == 1)
			<button class="btn btn-default" type="submit">Finalizar</span>
		@else
			<button class="btn btn-default" type="submit">En Proceso</span>
		@endif
</li>
@stop

@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraLibre/end.html','class'=>'form-horizontal','role'=>'form')) }}

<div class="row">
	<div class="col-lg-7">
		
	</div>	
	<br>
	{{ Form::hidden('id',$silabo->id,array('class'=>'form-control col-sm-2','required','readonly'=>'readonly'))}}
	
	{{Form::close()}}	
	<div class="col-lg-4">	

		<p ><b>NRO DE SILABO 	:	</b> {{$silabo->id}}
			</p>

		<p ><b>CAPITULO		:	</b>{{ $silabo->capitulo }}</p>
		
		<p ><b>TITULO 	: 	</b>{{ $silabo->titulo }}</p>
		
	</div>
	<div class="col-lg-7">
		
		<p ><b>OBJETIVOS 	:	</b></br> {{ $silabo->objetivos }}</p>
		<p><b>DESCRIPCION 	:	</b></br> {{ $silabo->descripcion }}  </p>
		<p><b>NUMERO DE CLASES 	:	</b> {{ $silabo->numeroclases}}</p>
		<p><b>ORDEN 		:	</b> {{ $silabo->orden }}</p>
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
		
	</div>
</div>
@stop