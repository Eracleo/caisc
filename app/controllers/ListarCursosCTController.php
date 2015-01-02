<?php

class ListarCursosCTController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		if(Auth::User()->tipoUsuario == 'Docente') //eso es por ah
		{
			$idDocente = Auth::User()->nroId;
			$carrera = Carrera::lists('nombre','id');
			$cursos = DB::select('call ListarCursosPorDocenteCT('.$idDocente.')');
			return View::make("ListarCursos.indexCT",compact('cursos'),array('carrera'=>$carrera));
		}
		else
			{return 'acesso restringido solo para docentes';}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
