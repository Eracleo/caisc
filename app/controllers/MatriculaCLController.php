<?php

class MatriculaCLController extends BaseController
{
	// funcion para recuperar los cursos libres y sus respectivas cargas academicas
	public function recibir(){
		// inner join para recuperar los cursos qeu estan registrados en la carga carga academica
		// cargas academicas con sus respectivos nombres de curso
		$cursos = DB::table('carga_academica_cl')
            		->join('curso_cl', 'carga_academica_cl.codCurso_cl', '=', 'curso_cl.id')
            		->select('carga_academica_cl.codCargaAcademica_cl', 'carga_academica_cl.codCurso_cl', 'curso_cl.nombre')
            		->get();
        return View::make("matriculaCL/seleccionarCurso", compact('cursos'));
	}

	// funcion para listar las matriculas segun el curso o carga academica de curso libre
	public function listarMatriculasXcargaAcademica(){
		$cod=Input::get('codigo'); // recupero el codigo de la carga academica del curso libre seleccionado
		$matriculas = DB::select('call listarMatriculaXCargaAcademic(?)', array($cod));
		return View::make('matriculaCL.index2',compact("datos"),array('matriculas'=>$matriculas));
	}

	public function index(){
		$matriculas = DB::select('call listar_matriculas_curso_libre()');
		return View::make('matriculaCL.index',array('matriculas'=>$matriculas));
	}

	public function listaCursosCLdisponibles(){
		$cursos = DB::select('call listar_cursosCL_disponibles()');
		return View::make('matriculaCL.listaCursos',array('cursos'=>$cursos));		
	}

	public function registrar($cod)
	{
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$curso = CargaAcademicaCL::where('codCargaAcademica_cl','=',$cod)->firstOrFail();
			//$curso->codig = $codMatri_new;
			return View::make('matriculaCL.registro',array('curso'=>$curso));
		}
	}

	public function insert()
	{
		$respuesta = MatriculaCL::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('matriculas_cl/lista_cursos')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('matriculas_curso_libre')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function delete($cod){
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCL::where('id','=',$cod)->delete();
			return Redirect::to('matriculas_curso_libre');
		}
	}

	public function edit($cod){
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$matricula = MatriculaCL::where('id','=',$cod)->firstOrFail();
			return View::make('matriculaCL.edit',array('matricula'=>$matricula));
		}
	}

	public function update(){
		//$input=Input::get('codDocente');
		$cod=Input::get('idt');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCL::where('id','=',$cod)->firstOrFail();
			if(is_object($matricula))
			{
				$matricula->codAlumno = Input::get('CodAlumno');
				$matricula->codCargaAcademica_cl = Input::get('CodCargaAcad');
				$matricula->save();
				return Redirect::to('/matriculas_curso_libre');
			} else {
				Redirect::to('500.html');
			}
		}
	}






	public function test(){
		$arreglo = DB::select('select C.codCargaAcademica_ct as codigo from curso_ct D inner join carga_academica_ct C on D.id = C.codCurso_ct where D.modulo = 1');
		foreach ($arreglo as $codigo) {
			echo $codigo->codigo;
		}
	}

	public function add()
	{
		return View::make('matriculaCL.add');
	}
}