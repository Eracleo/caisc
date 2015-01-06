<?php

class AsistenciaController extends BaseController
{
	public function inicioCT()
	{
		$idDocente = Auth::user()->nroId;
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	  	return View::make("asistencia/indexCT", compact('cursos'));
	}

	public function cursoCT()
	{
			$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("asistencia/ingresoCT", compact('cursos', 'id', 'alumnos'));
	}

	public function ingresoCT()
	{
		$idDocente = Auth::user()->nroId;
		//$nroId = Auth::user()->nroId;
		$id = Input::get('idCurso');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');

		$tema=Input::get("Tema");
		$Fecha=Input::get("Fecha");
		for ($i=1; $i <= Input::get('i'); $i++)
		{
			$Asist=Input::get("Asistio$i");
			$Observacion=Input::get("observacion$i");
			if ($Asist<>"") {
				$idAlumno = Input::get("cod$i");
				DB::select('call insertarAsistencia_CT(?,?,?,?,?,?)'
			    ,array($id,$tema,$idDocente,$idAlumno,$Fecha,$Observacion));
			}
		}
		return View::make("asistencia/indexCT", compact('cursos'));
	}

	public function consolidadoCT()
	{/*
		$idDocente = Auth::user()->nroId;
		//$Fecha=Input::get("Fecha");
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call Listar_Asistencias_fecha('.$idDocente.','.$Fecha.','.$id.')');
      	return View::make("asistencia/registroCT", compact('cursos', 'id', 'alumnos'));
      	*/
      	$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("asistencia/consolidadoCT", compact('cursos', 'id', 'alumnos'));

	}
	public function registroCT()
	{
		$idDocente = Auth::user()->nroId;
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
      	return View::make("asistencia/registroCT", compact('cursos'));
	}
// CURSO LIBRE
	public function inicioCL()
	{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
	      	return View::make("asistencia/indexCL", compact('cursos'));
	}
	public function cursoCL()
	{
		$idDocente = Auth::user()->nroId;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
      	return View::make("asistencia/ingresoCL", compact('cursos', 'id', 'alumnos'));
	}

	public function ingresoCL()
	{
		$idDocente = Auth::user()->nroId;
		//$nroId = Auth::user()->nroId;
		$id = Input::get('idCurso');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');

		$tema=Input::get("Tema");
		$Fecha=Input::get("Fecha");
		for ($i=1; $i <= Input::get('i'); $i++)
		{
			$Asist=Input::get("Asistio$i");
			$Observacion=Input::get("observacion$i");
			if ($Asist<>"") {
				$idAlumno = Input::get("cod$i");
				DB::select('call insertarAsistencia_CL(?,?,?,?,?,?)'
			    ,array($id,$tema,$idDocente,$idAlumno,$Fecha,$Observacion));
			}
		}
		return View::make("asistencia/indexCL", compact('cursos'));
		//return View::make("asistencia/consolidadoCL", compact('cursos'));
	}
	public function consolidadoCL()
	{
		/*
		$idDocente = Auth::user()->nroId;
		//$Fecha=Input::get("Fecha");
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call Listar_Asistencias_fecha('.$idDocente.','.$Fecha.','.$id.')');
		$idDocente = 10001;
		$id = Input::get('id');
      	return View::make("asistencia/registroCL", compact('cursos', 'id', 'alumnos'));
      	*/
      	$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("asistencia/consolidadoCT", compact('cursos', 'id', 'alumnos'));

	}
	public function registroCL()
	{
		$idDocente = Auth::user()->nroId;
		$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
      	return View::make("asistencia/registroCL", compact('cursos'));
	}

}