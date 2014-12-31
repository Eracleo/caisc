<?php

class MatriculaCTController extends BaseController
{

	public function index()
	{
		$semestres = Semestre::lists('nombre','nombre');
		return View::make('matriculaCT.index', array('semestres'=>$semestres));
	}
	//-- lista todas las matriculas de Carrera Tecnica
	public function listaMatriculas()
	{
		$matriculas = DB::select('call listarMatriculasCT()');
		return View::make('matriculaCT.lista_matriculas',array('matriculas'=>$matriculas));
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
			$curso = CargaAcademicaCT::where('codCargaAcademica_ct','=',$cod)->firstOrFail();
			return View::make('matriculaCT.registro',array('curso'=>$curso));
		}
	}

	public function insert_matriculaCT()
	{
		$respuesta = array();
		$codigo = Input::get('codAlumno');
		$carga = Input::get('codCargaAcademica_ct');
		$semest = Input::get('semestreCarga');
		$matricula_ct = DB::select('call insertMatriculaCT(?,?,?)',array($codigo,$carga,$semest));
		$respuesta['mensaje'] = 'Matricula Creada';
		$respuesta['error'] = false;
		$respuesta['data'] = $matricula_ct;
		return Redirect::to('matriculas_ct/listaMatriculas')->with('mensaje',$respuesta['mensaje']);
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

	// lista los cursos nuevos que puede matricularse en el actual modulo
	public function listacursosnuevosProcStore(){
		$cod = Input::get('codAlumno'); // codigo del alumno
		$semest = Input::get('semestre');

		$modulo = DB::table('alumno')->where('id', $cod)->pluck('modulo'); // modulo del alumno
		$codCarrera = DB::table('alumno')->where('id',$cod)->pluck('codCarrera'); // codigo de carrera del alumno
		$alumno = DB::table('alumno')->where('id', $cod)->first(); // recupero datos del alumno

		$cursosDisponibles = DB::select('call listarCursosFaltantesParaMatriculaCT(?,?,?,?)',array($cod,$modulo,$codCarrera,$semest));
		return View::make('matriculaCT.listaCursosNuevos', compact('alumno','semest'),array('cursos'=>$cursosDisponibles));
	}

	public function matricular_lista(){
		$cod = Input::get('codAlumno');
		$semestre = Input::get('semestreMatri');
		$arreglo = Input::get('cargas');
		foreach ($arreglo as $carga) {
			$carga_acade = $carga;
			$matricula_ct = DB::select('call insertMatriculaCT(?,?,?)',array($cod,$carga_acade,$semestre));
			//$respuesta['mensaje'] = 'Matricula Creada';
			//$respuesta['error'] = false;
			//$respuesta['data'] = $matricula_ct;
		}
		return Redirect::to('matriculas_ct/listaMatriculas');
	}

	public function test(){
		$cod = Input::get('codAlumno'); // codigo del alumno
		$modulo = DB::table('alumno')->where('id', $cod)->pluck('modulo'); // modulo del alumno
		$nroCursosAprob = DB::select('call actualizarModuloDelAlumno(?,?)',array($cod,$modulo));
		//$nro = $nroCursosAprob[0]["cursos_aprobados"];
		foreach ($nroCursosAprob as $nro) {
			$valor = $nro->cursos_aprobados;
			if ($valor >= 3) {
				echo "yuresz";
			}
		}
	}

	// (X) lista los cursos del siguiente modulo o semestre
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

	// (X) lista matriculas segun codigo
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