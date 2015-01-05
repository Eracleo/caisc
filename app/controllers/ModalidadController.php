<?php

class ModalidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$modalidad = Modalidad::orderBy('id','DESC')->get();

		return View::make('modalidad.index')->with('modalidad',$modalidad);
	}

	public function index()
	{
		$modalidad = Modalidad::orderBy('id','DESC')->get();

		return View::make('modalidad.index')->with('modalidad',$modalidad);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('modalidad.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$respuesta = array();
		$reglas = array(
			'id'=>array('required','min:5','max:30'),
			'descripcion'=>array('required','min:5','max:50'),
			'monto'=>array('required','regex:/^\d*(\.\d{2})?$/'));
		$input = Input::all();
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
			$respuesta['error'] = false;
		{

		$modalidad = new Modalidad;

		$modalidad->id = Input::get('id');
		$modalidad->descripcion = Input::get('descripcion');
		$modalidad->monto = Input::get('monto');


		if ($modalidad->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {                         
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
		}

		if($respuesta['error']==true)
		{
			return Redirect::to('modalidad/create')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('modalidad');
		}



		//return Redirect::to('modalidad/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  String  $nombre
	 * @return Response
	 */
	public function getShow($id = null)
	{
		$modalidad = Modalidad::find($id);
		//$modalidad = modalidad::getAttribute($id)
		//$modalidad = modalidad::table('modalidad_pago')-->where('nombre','=',$nombre)-->get();
		return View::make('modalidad.show')->with('modalidad',$modalidad);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  String $id
	 * @return Response
	 */
	public function getEdit($id = null)
	{
		$modalidad = Modalidad::find($id);

		return View::make('modalidad.edit')->with('modalidad',$modalidad);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$modalidad = Modalidad::find($id);

		$modalidad->id = Input::get('id');
		$modalidad->descripcion = Input::get('descripcion');
		$modalidad->monto = Input::get('monto');
		if ($modalidad->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
		return Redirect::to('modalidad/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($nombre)
	{
		$modalidad = Modalidad::find($nombre);
		$detalle = DetallePagos::where('id_modalidad','=',$nombre)->firstOrFail();
		if (is_object($detalle)){
			Session::flash('message','Modalidad en Uso!');
			Session::flash('class','danger');
		} else {
			if ($modalidad->delete()) {
				Session::flash('message','Eliminado correctamente!');
				Session::flash('class','success');
				
			} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}				
		}
		return Redirect::to('modalidad');
	}	


	public function getModalidad()
	{
		$modalidad = Modalidad::orderBy('id','DESC')->get();

		return View::make('pagos.showAlumno')->with('modalidad',$modalidad);
	}

}