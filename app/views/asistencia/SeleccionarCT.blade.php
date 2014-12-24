@extends('layouts.base_admin')
@section('content')
<form action="ModificarCT" name="form1" method="post">
    <div class="form-group">
    	  <label for="">Introduzca el Código : </label> 
   			<input type="text"  name="codigo"  >
    	<label for="">Seleccione Asignatura : </label>
	        <select name='id' id='id' onChange='document.form1.submit()'>
	        	<option value='0'>Seleccionar Asignatura</option>;
	        	@foreach( $cursos as $curso)
					<option value='{{ $curso -> id }}'>{{ $curso -> nombre }}</option>;
			    @endforeach
			    
			  
	        </select>
	        


    </div>
</form>

@stop