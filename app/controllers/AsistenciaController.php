<?php

class AsistenciaController extends BaseController
{

/*****************************************************************************************************************
********************************************** CARRERA TÉCNICA ***************************************************
*****************************************************************************************************************/
	public function inicioCT()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("asistencia/indexCT", compact('cursos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}

	public function cursoCT()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
	      	return View::make("asistencia/ingresoCT", compact('cursos', 'id', 'alumnos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}

	public function ingresoCT()
	{

		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;;
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
				    ,array('10001',$tema,$idDocente,$idAlumno,$Fecha,$Observacion));
				}
			}
			return View::make("asistencia/indexCT", compact('cursos'));
			//return View::make("asistencia/ListaCT", compact('cursos', 'id', 'alumnos'));
		 }
      	else
      	{
      		return View::make("asistencia/error.303");
      	}
	}

	public function consolidadoCT()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;
			$Fecha=Input::get("Fecha");
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call Listar_Asistencias_fecha('.$idDocente.','.$Fecha.','.$id.')');
			$idDocente = 10001;
			$id = Input::get('id');
	      	return View::make("asistencia/registroCT", compact('cursos', 'id', 'alumnos'));
      	 }
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function registroCT()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("asistencia/registroCT", compact('cursos'));
	    }
      	else
      	{
      		return View::make("error.303");
      	}
	}

/*************************************************************************************************************
********************************************** CURSO LIBRE ***************************************************
**************************************************************************************************************/

public function inicioCL()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
	      	return View::make("asistencia/indexCL", compact('cursos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function cursoCL()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
			$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
	      	return View::make("asistencia/ingresoCL", compact('cursos', 'id', 'alumnos'));
	    }
      	else
      	{
      		return View::make("error.303");
      	}
	}

	public function ingresoCL()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;;
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
				    ,array('10001',$tema,$idDocente,$idAlumno,$Fecha,$Observacion));
				}
			}
			return View::make("asistencia/indexCL", compact('cursos'));
			return View::make("asistencia/consolidadoCL", compact('cursos'));
			//return View::make("asistencia/ListaCT", compact('cursos', 'id', 'alumnos'));
		 }
      	else
      	{
      		return View::make("asistencia/error.303");
      	}
	}
	public function consolidadoCL()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;
			$Fecha=Input::get("Fecha");
			$id = Input::get('id');
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
			$alumnos = DB::select('call Listar_Asistencias_fecha('.$idDocente.','.$Fecha.','.$id.')');
			$idDocente = 10001;
			$id = Input::get('id');
	      	return View::make("asistencia/registroCL", compact('cursos', 'id', 'alumnos'));
	    }
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function registroCL()
	{
		if(Auth::user()->tipoUsuario == 'Personal')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("asistencia/registroCL", compact('cursos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}

}