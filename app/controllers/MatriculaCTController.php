<?php

class MatriculaCTController extends BaseController
{

	public function index()
	{
		$semestres = Semestre::lists('nombre','id');
		return View::make('matriculaCT.index', array('semestres'=>$semestres));
	}
	//-- lista todas las matriculas de Carrera Tecnica
	public function listaMatriculas($registros=15)
	{
		$datos = DB::table('matricula_ct')
						->join('alumno','matricula_ct.codAlumno','=', 'alumno.id')
						->join('carga_academica_ct','matricula_ct.codCargaAcademica_ct','=','carga_academica_ct.codCargaAcademica_ct')
						->join('curso_ct','carga_academica_ct.codCurso_ct','=','curso_ct.id')
						->select('matricula_ct.id','matricula_ct.semestre','matricula_ct.codAlumno','alumno.nombre as alumno','matricula_ct.codCargaAcademica_ct','curso_ct.nombre')
						->paginate($registros);
		return View::make('matriculaCT.lista_matriculas',compact("datos"));
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

	public function delete($cod)
	{
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$nota_ct = NotaCT::where('codMatricula_ct','=',$cod)->delete();
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

	public function update()
	{
		$cod = Input::get('idt'); // Código de matricula
		$codAlumno = Input::get('CodAlumno');
		if (($codAlumno == '') or ! is_numeric($codAlumno)) {
			$respuesta['mensaje'] = 'ERROR !!! Código Alumno no válido, Verifique que los datos ingresados esten bien.';
			$respuesta['error'] = true;
			return Redirect::to('matriculas_ct/edit/'.$cod)->with('mensaje',$respuesta['mensaje'])->withInput();
		} else{
			$query_alumno = DB::select('call existe_alumno(?)',array($codAlumno));
			foreach ($query_alumno as $value) {
				$exist = $value->dato;
				if ($exist == 1) {
					// si es que existe el alumno
					// consultamos si existe carga academica
					$carga = Input::get('CodCargaAcad');
					$query_carga = DB::select('call existe_cargaAcademica_ct(?)',array($carga));
					foreach ($query_carga as $valueB) {
						$existB = $valueB->dato;
						if ($existB == 1) {
							// si existe el codigo de carga academica
							$semes = Input::get('semest');
							$buscar = DB::select('call buscarMatriculaCT(?,?,?)', array($codAlumno,$carga,$semes));
							$lonf = sizeof($buscar);
							if ($lonf > 0) {
								$respuesta['mensaje'] = 'Error!!! La matricula ya existe. Código alumno duplicado o Código Carga Academica duplicado';
								$respuesta['error'] = true;
								return Redirect::to('matriculas_ct/edit/'.$cod)->with('mensaje',$respuesta['mensaje'])->withInput();
							} else{
								$matricula = MatriculaCT::where('id','=',$cod)->firstOrFail();
								if(is_object($matricula)){
									$matricula->codAlumno = $codAlumno;
									$matricula->codCargaAcademica_ct = $carga;
									$matricula->save();
									return Redirect::to('matriculas_ct/listaMatriculas');
								} else {
									Redirect::to('500.html');
								}
							}
						} else{
							// no existe codigo de carga academica
							$respuesta['mensaje'] = 'ERROR !!! Código de Carga Académica no existe.';
							return Redirect::to('matriculas_ct/edit/'.$cod)->with('mensaje',$respuesta['mensaje'])->withInput();
						}
					}
				} else{
					// si es que no existe el alumno
					$respuesta['mensaje'] = 'ERROR !!! Código Alumno no existe.';
					return Redirect::to('matriculas_ct/edit/'.$cod)->with('mensaje',$respuesta['mensaje'])->withInput();
				}
			}
		}
	}

	// lista los cursos nuevos que puede matricularse en el actual modulo
	public function listacursosnuevosProcStore(){
		$respuesta = array();
		$cod = Input::get('codAlumno'); // codigo del alumno
		if (($cod == '') or ! is_numeric($cod)) {
			$respuesta['mensaje'] = 'ERROR !!! Código Alumno no válido, Verifique que los datos ingresados esten bien.';
			$respuesta['error'] = true;
			return Redirect::to('matriculas_ct/registro')->with('mensaje',$respuesta['mensaje'])->withInput();
		}else {
			$query_alumno = DB::select('call existe_alumno(?)',array($cod));
			foreach ($query_alumno as $valor) {
				$existe = $valor->dato;
				//echo(gettype($existe));
				if ($existe == 1) {
					$semest = Input::get('semestre');

					$modulo = DB::table('alumno')->where('id', $cod)->pluck('modulo'); // modulo del alumno
					$codCarrera = DB::table('alumno')->where('id',$cod)->pluck('codCarrera'); // codigo de carrera del alumno
					$alumno = DB::table('alumno')->where('id', $cod)->first(); // recupero datos del alumno

					$cursosDisponibles = DB::select('call listarCursosFaltantesParaMatriculaCT(?,?,?,?)',array($cod,$modulo,$codCarrera,$semest));
					return View::make('matriculaCT.listaCursosNuevos', compact('alumno','semest'),array('cursos'=>$cursosDisponibles));
				} else{
					$respuesta['mensaje'] = 'ERROR !!! Código Alumno no existe.';
					$respuesta['error'] = true;
					return Redirect::to('matriculas_ct/registro')->with('mensaje',$respuesta['mensaje'])->withInput();
				}
			}
		}
	}

	public function matricular_lista(){
		$respuesta = array();
		$cod = Input::get('codAlumno');
		$semestre = Input::get('semestreMatri');
		$arreglo = Input::get('cargas');
		if (empty($arreglo)) {
			$respuesta['mensaje'] = 'No hay registros para matricular. Ingrese de nuevo';
			$respuesta['error'] = true;
			$respuesta['data'] = '';
			return Redirect::to('matriculas_ct/registro')->with('mensaje',$respuesta['mensaje']);
		}else{
			foreach ($arreglo as $carga) {
					$carga_acade = $carga;
					$buscarMCT = DB::select('call buscarMatriculaCT(?,?,?)', array($cod,$carga_acade,$semestre));
					$lonf = sizeof($buscarMCT);
					if ($lonf > 0) {
						$respuesta['mensaje'] = 'Error!!! La matricula ya existe';
						$respuesta['error'] = true;
						return Redirect::to('.')->with('mensaje',$respuesta['mensaje'])->withInput();
					} else{
						$matricula_ct = DB::select('call insertMatriculaCT(?,?,?)',array($cod,$carga_acade,$semestre));
						// $respuesta['mensaje'] = 'Matricula Creada';
						// $respuesta['error'] = false;
						// $respuesta['data'] = $matricula_ct;
						// return Redirect::to('matriculas_curso_libre')->with('mensaje',$respuesta['mensaje']);
					}
				}
			$respuesta['mensaje'] = 'Matrículas registradas correctamente';
			$respuesta['error'] = false;
			//return Redirect::to('matriculas_ct/listaMatriculas')->with('mensaje',$respuesta['mensaje']);

			$alumno = DB::table('alumno')->where('id', $cod)->first();
			$cursosMatriculados = DB::select('call listarMatriculasAlumnoSemestre(?,?)',array($cod,$semestre));
			return View::make('matriculaCT.lista_matriculas_alumno', compact('alumno','semestre'),array('cursos'=>$cursosMatriculados));
		}
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