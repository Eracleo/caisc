<?php

class PagosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$alumnos = Alumno::orderBy('id','DESC')->get();

		return View::make('pagos.index')->with('alumnos',$alumnos);
	}
	/*public function index()
	{
		$pagos = Pagos::orderBy('id','DESC')->get();

		return View::make('pagos.index')->with('pagos',$pagos);
	}*/

	public function getCreate()
	{
		return View::make('pagos.create');
	}
	public function store()
	{
		$respuesta = Pagos::agregar(Input::all());
		if($respuesta['error']!=true){
			$pagos = new Pagos;

			//$pagos->id = Input::get('');
			$pagos->nro_serie = Input::get('nro_serie');
			$pagos->id_alumno = Input::get('id_alumno');
			$pagos->fecha = Input::get('fecha');
			$pagos->total_pago = Input::get('total');

			if ($pagos->save()) {
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');
			} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}
			$detalle_pagos = new DetallePagos;
			
			$detalle_pagos->id = Input::get('id');
			$detalle_pagos->pagos_id = $pagos->id;
			$detalle_pagos->descripcion = Input::get('concepto');
			$detalle_pagos->id_modalidad=Input::get('modalidad');

			if ($detalle_pagos->save()) {
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');
			} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}
			return Redirect::to('pagos/create');
		} else {
			Session::flash('message','Elija Modalidad');
			Session::flash('class','danger');
			return Redirect::to('pagos/create');			
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  String  $nombre
	 * @return Response
	 */
	public function getShow($id = null)
	{
		$pagos = Pagos::find($id);
		//$pagos = Pagos::getAttribute($id)
		//$pagos = Pagos::table('pagos_pago')-->where('nombre','=',$nombre)-->get();
		return View::make('pagos.show')->with('pagos',$pagos);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  String $id
	 * @return Response
	 */
	public function getEdit($id = null)
	{
		$pagos = Pagos::find($id);

		return View::make('pagos.edit')->with('pagos',$pagos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$pagos = Pagos::find($id);

		$pagos->id = Input::get('id');
		$pagos->nro_serie = Input::get('nro_serie');
		$pagos->id_alumno = Input::get('id_alumno');
		$pagos->fecha = Input::get('fecha');
		$pagos->total_pago = Input::get('total_pago');

		if ($pagos->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
		return Redirect::to('pagos/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pagos = Pagos::find($id);

		if ($pagos->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('pagos');
	}
	public function profile($id = null)
	{
		$modalidad = Modalidad::lists('id','monto');
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$alumno = Alumno::where('id','=',$id)->firstOrFail();
			if (is_object($alumno))
			{
				return View::make('pagos.showAlumno',array('alumno'=>$alumno,'modalidad'=>$modalidad));
				//return Redirect::to('pagos/create')->withErrors($respuesta['mensaje'] )->withInput();
				//return Redirect::to('pagos/create/',array('alumno'=>$alumno,'modalidad'=>$modalidad));
			} else {
				return Redirect::to('404.html');
			}
		}
	}

	public function search()
	{
		$modalidad = Modalidad::orderBy('id','DESC')->get();
		$pago = Pagos::max('id');

		$id = Input::get('id_alumno');

		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$alumno = Alumno::find($id);
			if (is_object($alumno))
			{
				return View::make('pagos.showAlumno',array('alumno'=>$alumno,'modalidad'=>$modalidad,'pago'=>$pago));
				//return Redirect::to('pagos/create')->withErrors($respuesta['mensaje'] )->withInput();
				//return Redirect::to('pagos/create/',array('alumno'=>$alumno,'modalidad'=>$modalidad));
			} else {
				return Redirect::to('404.html');
			}
		}
	}

	public function add()
	{
		$modalidad = Modalidad::lists('id','monto');
		return View::make('pagos.create',array('modalidad'=>$modalidad));
	}


	public function search_pagos($registros=10){

		$id = Input::get('fecha');
		
		if ($id == '')
		{	
			$datos = Pagos::paginate($registros);
			Session::flash('message','Ingrese una Fecha');
			Session::flash('class','danger');
			return View::make('pagos.search_pagos',compact("datos"));
			
		} else {

			$datos = Pagos::where('fecha','=',$id)->orderBy('id','ASC')->paginate($registros);
			$pagos = Pagos::where('fecha','=',$id)->get();

			if (is_object($pagos)){
				Session::flash('message','Consulta Satisfactoria');
				Session::flash('class','success');
				return View::make('pagos.search_pagos',compact("datos"),array('pagos'=>$pagos));
				//return Redirect::to('pagos/create')->withErrors($respuesta['mensaje'] )->withInput();
				//return Redirect::to('pagos/create/',array('alumno'=>$alumno,'modalidad'=>$modalidad));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function search_detail_pagos($registros=10)
	{
		$id = Input::get('boleta');
		
		if ($id == '')
		{
			$datos = Pagos::paginate($registros);
			Session::flash('message','Ingrese Número de Boleta');
			Session::flash('class','danger');
			return View::make('pagos.search_detail_pagos',compact("datos"));		

		} else {
			$datos = DetallePagos::where('pagos_id','=',$id)->orderBy('id','ASC')->paginate($registros);	
			$detalle = DetallePagos::where('pagos_id','=',$id)->firstOrFail();
			
			
			if (is_object($detalle))
			{
				$id_modalidad = $detalle->id_modalidad;
				$modalidad = Modalidad::where('id','=',$id_modalidad)->firstOrFail();

				Session::flash('message','Consulta Satisfactoria');
				Session::flash('class','success');
				return View::make('pagos.search_detail_pagos',compact("datos"),array('detalle_pagos'=>$detalle,'detalle_modalidad'=>$modalidad));
				//return Redirect::to('pagos/create')->withErrors($respuesta['mensaje'] )->withInput();
				//return Redirect::to('pagos/create/',array('alumno'=>$alumno,'modalidad'=>$modalidad));
			} else {
				return Redirect::to('404.html');
			}
		}	
	}
	public function search_pagos_alumno($registros=10)
	{
		$id = Input::get('codigo');
		
		if (is_null($id))
		{
			$datos = Pagos::paginate($registros);
			return View::make('pagos.search_pagos_alumno',compact("datos"));
			Session::flash('message','Ingrese Código Alumno');
			Session::flash('class','danger');
			
		} else {
			$datos = Pagos::where('id_alumno','=',$id)->orderBy('id','ASC')->paginate($registros);
			$pagos = Pagos::where('id_alumno','=',$id)->get();
			if (is_object($pagos))
			{
				Session::flash('message','Consulta Satisfactoria');
				Session::flash('class','success');
				return View::make('pagos.search_pagos_alumno',compact("datos"),array('pagos'=>$pagos));
				//return Redirect::to('pagos/create')->withErrors($respuesta['mensaje'] )->withInput();
				//return Redirect::to('pagos/create/',array('alumno'=>$alumno,'modalidad'=>$modalidad));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
}