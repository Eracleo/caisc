@extends('layouts.base_admin')
@section('title')
Lista de cargos <small></small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('personal','Personal') }}</li>
<li>Cargos</li>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
    	<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
        	<div class="row">
        		<div class="col-xs-6">
        			<div class="dataTables_length" id="example1_length">
        				<label><select aria-controls="example1" size="1" name="example1_length">
        					<option selected="selected" value="10">10</option>
        					<option value="25">25</option>
        					<option value="50">50</option>
        					<option value="100">100</option>
        				</select> records per page</label>
        			</div>
        		</div>
        		<div class="col-xs-6">
        			<div id="example1_filter" class="dataTables_filter">
        				<label>Search: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('personal/cargo/add.html','Agregar Cargo') }}
        			</div>
        		</div>
        	</div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                    	<th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Id</th>
                    	<th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Nombre</th>
                    	<th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Privilegios</th>
                    	<th aria-label="Engine version: activate to sort column ascending" style="width: 163px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Descripción</th>
                    	<th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Actions</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
            	@foreach( $cargos as $cargo)
            	<tr class="odd">
                        <td class="  sorting_1">{{ HTML::link('docente/profile/'.$cargo->id,$cargo->id) }}</td>
                        <td class=" ">{{ $cargo->nombre }}</td>
                        <td class=" ">{{ $cargo->privilegios }}</td>
                        <td class=" ">{{ $cargo->descripcion }}</td>
                        <td class=" ">
                        	{{ HTML::link('docente/edit/'.$cargo->id,'Actualizar') }}
                        	{{ HTML::link('docente/delete/'.$cargo->id,'Eliminar') }}
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /.box-body -->
</div>
@stop
