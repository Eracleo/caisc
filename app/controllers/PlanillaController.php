<?php

class AsistenciaController extends BaseController
{
	public function add_ct()
	{
		return View::make('asistencia.add_ct');
	}

	public function add_cl()
	{
		return View::make('asistencia.add_cl');
	}

	public function InicioLista()
	 {
	 	$Fecha=Input::get("Fecha");
	 	$idDocente = 10001;
	 	$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
       	return View::make("asistencia/ListaAsistencia", compact('cursos','Fecha'));
	 }
	public function ListaAsistencia()
	{
		$idDocente = 10001;
		$Fecha=Input::get("Fecha");
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call Listar_Asistencias_fecha(' . $idDocente . ','.$Fecha.',"10001")');		
      	return View::make("asistencia/ListaCT", compact('cursos', 'id', 'alumnos'));
	}
	public function inicioCT()
	{ 
		$idDocente = 10001;
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
      	return View::make("asistencia/indexCT", compact('cursos'));
	}

	public function cursoCT()
	{ 
		$idDocente = 10001;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
      	return View::make("asistencia/ingresoCT", compact('cursos', 'id', 'alumnos'));
	}
	
	public function ingresoCT()
	{ 
		
		$idDocente = 10001;
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
	public function SeleccionarCT()
	{
		$idDocente = 10001;
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
      	return View::make("asistencia/SeleccionarCT", compact('cursos'));
    }

	public function ModificarCT()
	{ 
		$nroId = Auth::user()->nroId; 
		$Codigo = 'A0001';
		$id = Input::get('idCurso');
		$cursos = DB::select('call CursosXDocenteCT(' . $nroId . ')');
		$alumnos = DB::select('call AlumnoXCursoCT(?,?)', array($id,$Codigo));		
		$Observacion=Input::get("$Observacion");
		

		for ($i=1; $i <= Input::get('i'); $i++) { 		
			
				$idAlumno = Input::get("cod$i");		
				DB::select('call insertarAsistencia_CT(?,?,?,?,?,?)'
			    ,array('10001',$tema,$nroId,$idAlumno,$Fecha,$Observacion));
      	
		}
		return View::make("asistencia/indexCT", compact('cursos'));
		
		//return View::make("asistencia/ListaCT", compact('cursos', 'id', 'alumnos'));
	} 

	public function consolidadoCT()
	{ 
		$idDocente = 10001;
		$Fecha=Input::get("Fecha");
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call Listar_Asistencias_fecha('.$idDocente.','.$Fecha.','.$id.')');
		$idDocente = 10001;
		$id = Input::get('id');		
      	return View::make("asistencia/registroCT", compact('cursos', 'id', 'alumnos'));
	}
	public function registroCT()
	{ 
		$idDocente = 10001;
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
      	return View::make("asistencia/registroCT", compact('cursos'));
	}
}