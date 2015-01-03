<?php

class FuncionalidadAlumnoController extends \BaseController {

	public function perfil()
	{
		if(Auth::user()->tipoUsuario == 'Alumno')
		{
			$id = Auth::user()->nroId;
			$alumno = Alumno::where('id','=',$id)->firstOrFail();
			return View::make('funcionalumno/perfil',array('alumno'=>$alumno));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function iniciocursosmatriculados()
	{
      	if(Auth::user()->tipoUsuario == 'Alumno')
		{
			$elementosComboSemestre = Semestre::all();
      		return View::make("funcionalumno/vermatricula", compact('elementosComboSemestre'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function cursosmatriculados()
	{
		if(Auth::user()->tipoUsuario == 'Alumno')
		{
			$idCurso = Input::get('id');
			$idAlumno = Auth::user()->nroId;;
			$elementosComboSemestre = Semestre::all();
			$cursos = DB::select('call CursosDAlumnoXSemestre(' .$idAlumno.','. $idCurso . ')');
	      	return View::make("funcionalumno/matricula", compact('elementosComboSemestre', 'idCurso', 'cursos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function inicionotascursos()
	{
      	if(Auth::user()->tipoUsuario == 'Alumno')
		{
			$elementosComboSemestre = Semestre::all();
      		return View::make("funcionalumno/vernotas", compact('elementosComboSemestre'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}
	public function notascursos()
	{
		if(Auth::user()->tipoUsuario == 'Alumno')
		{
			$idCurso = Input::get('id');
			$idAlumno = Auth::user()->nroId;;
			$elementosComboSemestre = Semestre::all();
			$cursos = DB::select('call NotasDAlumnoXSemestre(' .$idAlumno.','. $idCurso . ')');
	      	return View::make("funcionalumno/notas", compact('elementosComboSemestre', 'idCurso', 'cursos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}
}