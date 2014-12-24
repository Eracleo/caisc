@extends('layouts.base_admin')
@section('title')
Detalle de pago de Planilla <small>Docente</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Docentes') }}</li>
<li>{{$docente->nombre}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		
		<p align="center"><b>código:</b>{{ $docente->id }}</p>
	</div>
	<div class="col-lg-7">

		<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                    	   <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nro.</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Código de Curso </th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Academicas</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Costo</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Monto de Pago (S/.)</th>
                      </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
		<tr class="odd">
		
		

		<p><b>DNI:</b>{{ $docente->dni }}</p>
		<p><b>Nombre:</b> {{ $docente->nombre }}</p>
		<p><b>Apellidos:</b> {{ $docente->apellidos }}</p>

		  @foreach($total as $total)		
				<p><b>Total:</b>{{ $total->Pago }}</p>
		  @endforeach

		<h1>Detalle de Carrera Técnica</h1>	
		<?php $i=1 ?>
		@foreach($planilla as $planilla)
		<tr class="odd">
            <td class="">{{ $i }}</td>
            <td class="">{{ $planilla->Codigo }}</td>
            <td class="">{{ $planilla->horas }}</td>
            <td class="">S/. 15</td>
            <td class="">{{ $planilla->Pago }}</td>


        </tr>
        <?php $i++ ?>
        @endforeach

      
	
		</tr>
	</tbody>
</table>



<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                    	   <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nro.</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Código de Curso </th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Academicas</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Costo</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Monto de Pago (S/.)</th>
                      </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
		<tr class="odd">
		

		  @foreach($total_cl as $total_cl)		
				<p><b>Total:</b>{{ $total_cl->Pago }}</p>
		  @endforeach

		<h1>Detalle de Cursos Libres </h1>	
		<?php $i=1 ?>
		@foreach($planilla_cl as $planilla_cl)
		<tr class="odd">
            <td class="">{{ $i }}</td>
            <td class="">{{ $planilla_cl->Codigo }}</td>
            <td class="">{{ $planilla_cl->horas }}</td>
            <td class="">S/. 15</td>
            <td class="">{{ $planilla_cl->Pago }}</td>


        </tr>
        <?php $i++ ?>
        @endforeach

      
	
		</tr>
	</tbody>
</table>

	</div>
</div>
@stop
