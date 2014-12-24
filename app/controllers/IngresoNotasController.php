<?php

class IngresoNotasController extends \BaseController {

/*************************************************************************************************************
********************************************** CARRERA TECNICA ***********************************************
**************************************************************************************************************/
	public function inicioCT()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("ingresonotas/indexCT", compact('cursos'));
      	}
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}
	public function cursoCT()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("ingresonotas/ingresoCT", compact('cursos', 'id', 'alumnos'));
      	}
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}
	public function ingresoCT()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			for ($i=1; $i <= Input::get('i'); $i++) { 
				$id = Input::get("codMatricula$i");
				$nota1 = Input::get("nota1$i");
				$nota2 = Input::get("nota2$i");
				$nota3 = Input::get("nota3$i");
				$nota = NotaCT::find($id);
				$nota->notaa =  $nota1;
				$nota->notab =  $nota2;
				$nota->notac =  $nota3;
				$nota->save();
			}
			$idDocente = Auth::user()->nroId;
			$id = Input::get('idCurso');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("ingresonotas/consolidadoCT", compact('cursos', 'id', 'alumnos'));
			
      	}
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	} 
	public function consolidadoCT()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("ingresonotas/consolidadoCT", compact('cursos', 'id', 'alumnos'));
	    }
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}
	public function registroCT()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("ingresonotas/registroCT", compact('cursos'));
      	}
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}

/*************************************************************************************************************
********************************************** CURSO LIBRE ***************************************************
**************************************************************************************************************/
	public function inicioCL()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
	      	return View::make("ingresonotas/indexCL", compact('cursos'));
      	}
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}
	public function cursoCL()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
	      	return View::make("ingresonotas/ingresoCL", compact('cursos', 'id', 'alumnos'));
	    }
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}

	public function ingresoCL()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			for ($i=1; $i <= Input::get('i'); $i++) { 
				$id = Input::get("codMatricula$i");
				$nota1 = Input::get("nota$i");
				$nota = NotaCL::find($id);
				$nota->nota =  $nota1;
				$nota->save();
			}
			$idDocente = Auth::user()->nroId;
			$id = Input::get('idCurso');
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
	      	return View::make("ingresonotas/consolidadoCL", compact('cursos', 'id', 'alumnos'));
	    }
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	} 
	public function consolidadoCL()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
	      	return View::make("ingresonotas/consolidadoCL", compact('cursos', 'id', 'alumnos'));
	    }
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}
	public function registroCL()
	{ 
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("ingresonotas/registroCL", compact('cursos'));
      	}
      	else
      	{
      		return View::make("ingresonotas/noautenticado");
      	}
	}
}