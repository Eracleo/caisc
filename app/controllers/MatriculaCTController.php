<?php

class MatriculaCTController extends BaseController
{
	public function index(){
		return View::make('matriculaCT.index');
	}
	//-- lista todas las matriculas de Carrera Tecnica
	public function listaMatriculas($registros=5){
		$datos = MatriculaCT::paginate($registros);
		$matriculas = MatriculaCT::all();
		return View::make('matriculaCT.lista_matriculas',compact("datos"),array('matriculas'=>$matriculas));
	}

	public function edit($cod)
	{
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$matricula = MatriculaCT::where('id','=',$cod)->firstOrFail();
			return View::make('matriculaCT.edit',array('matricula'=>$matricula));
		}
	}
	
	public function update()
	{
		//$input=Input::get('codDocente');
		$cod=Input::get('idt');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCT::where('id','=',$cod)->firstOrFail();
			if(is_object($matricula))
			{
				$matricula->codAlumno = Input::get('CodAlumno');
				$matricula->codCargaAcademica_ct = Input::get('CodCargaAcad');
				$matricula->modulo = Input::get('mod');
				$matricula->save();
				return Redirect::to('matriculas_ct/listaMatriculas');
			} else {
				Redirect::to('500.html');
			}
		}
	}

	public function delete($cod)
	{
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCT::where('id','=',$cod)->delete();
			return Redirect::to('matriculas_ct/listaMatriculas');
		}
	}

	public function listacursosSemestreNuevo(){
		// recuperamos el contenido de codAlumno
		$cod = Input::get('codAlumno'); // CODIGO ALUMNO
		//$semestre_ant = DB::table('alumno')->where('id', $cod)->pluck('modulo');
		$modulo = DB::table('alumno')->where('id', $cod)->pluck('modulo');
		$alumno = DB::table('alumno')
						->where('id', $cod)
						->first();
		$cursosDisponibles = DB::table('curso_ct')
								->leftJoin('carga_academica_ct', 'curso_ct.id', '=', 'carga_academica_ct.codCurso_ct')
								->where('curso_ct.modulo', '=', $modulo)
								->select('carga_academica_ct.codCargaAcademica_ct', 'carga_academica_ct.codCurso_ct', 'carga_academica_ct.docente_id', 'curso_ct.modulo', 'carga_academica_ct.turno', 'carga_academica_ct.grupo')
								->get();
		//$cursos = CargaAcademicaCT::where('semestre','=',$modulo)->get();
		// Envio los cursos del semestre que le toca
		return View::make('matriculaCT.listaCursosNuevos', compact('alumno'),array('cursos'=>$cursosDisponibles));
	}

	public function listacursosSemestreNuevoTest(){
		// recuperamos el contenido de codAlumno
		$cod = Input::get('codAlumno'); // CODIGO ALUMNO
		$semestreAlumno = DB::table('alumno')->where('id', $cod)->pluck('modulo');
		if ($semestreAlumno == 1) {
			$cursos = CargaAcademicaCT::where('semestre','=',$semestreAlumno)->get();
		} else {

		}
		return View::make('matriculaCT.listaCursosNuevos', compact('alumno'),array('cursos'=>$cursos));
	}

	public function registroMatricula($cod){
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			//-- recuperamos el ultimo id de los registros de matricula_cl
			$codMatri_old = DB::table('matricula_ct')
							->max('id');
			//-- aumentamos en 1 al ID del registro
			$codMatri_new=(int)($codMatri_old)+1;
			$curso = CargaAcademicaCT::where('codCargaAcademica_ct','=',$cod)->firstOrFail();
			$curso->codig = $codMatri_new;
			return View::make('matriculaCT.registro',array('curso'=>$curso));
		}
	}

	public function insert(){
		$respuesta = MatriculaCT::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('matriculas_ct/listaMatriculas')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('matriculas_ct/listaMatriculas')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function matricular(){
		var_dump(Input::get('codigs'));
		var_dump(serialize(Input::get('codigs')));
	}







	
	// lista los cursos del siguiente modulo o semestre
	public function listacursosnuevos(){
		// recupero el valor del textbox codAlumno
		$cod = Input::get('codAlumno');
		$mayor = DB::table('matricula_ct')
							->where('codAlumno','=',$cod)
							->max('modulo');
		$mod=(int)($mayor)+1;
		$cursos = CargaAcademicaCT::where('semestre','=',$mod)->get();
		return View::make('matriculaCT.listaCursosNuevos',array('cursos'=>$cursos,'codigo'=>$cod));
	}

	public function listaMatri($cod){
		$matriculas = MatriculaCT::where('codAlumno','=',$cod)->get();
		return View::make('matriculaCT.lista',array('matriculas'=>$matriculas));
	}


	public function add()
	{
		$modulos = Modulo::lists('id','nombre');
		return View::make('matriculaCT.add',array('modulos'=>$modulos));
	}
	
}