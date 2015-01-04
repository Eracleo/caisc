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

    public function modificarAlum(){
        if(Auth::user()->tipoUsuario == 'Alumno')
            {
            $id = Auth::user()->nroId;
            $alumno = Alumno::where('id','=',$id)->firstOrFail();
            return View::make('funcionalumno/edit',array('alumno'=>$alumno));
        }
    }

    public function update()
    {
        if(Auth::user()->tipoUsuario == 'Alumno'){
            $id = Auth::user()->nroId;
            $obj = Alumno::where('id','=',$id)->firstOrFail();
            if(is_object($obj))
            {
                $respuesta = Alumno::editarB($obj,Input::all());
                if($respuesta['error']==true)
                {
                    return Redirect::to('alumnosB/modificar')->withErrors($respuesta['mensaje'])->withInput();
                }
                return Redirect::to('alumnoB/perfil')->withErrors($respuesta['mensaje']);
            }
        } else{ Redirect::to('400.html'); }
    }

    public function indexCT(){
        $semestres = Semestre::lists('nombre','id');
        return View::make('funcionalumno.index', array('semestres'=>$semestres));
    }

    public function listacursosnuevosProcStore(){
        if(Auth::user()->tipoUsuario == 'Alumno'){
            $cod = Auth::user()->nroId;
            $semest = Input::get('semestre');

            $modulo = DB::table('alumno')->where('id', $cod)->pluck('modulo'); // modulo del alumno
            $codCarrera = DB::table('alumno')->where('id',$cod)->pluck('codCarrera'); // codigo de carrera del alumno
            $alumno = DB::table('alumno')->where('id', $cod)->first(); // recupero datos del alumno

            $cursosDisponibles = DB::select('call listarCursosFaltantesParaMatriculaCT(?,?,?,?)',array($cod,$modulo,$codCarrera,$semest));
            return View::make('funcionalumno.listaCursosNuevos', compact('alumno','semest'),array('cursos'=>$cursosDisponibles));
        }
    }

    public function matricular_lista(){
        $respuesta = array();
        if(Auth::user()->tipoUsuario == 'Alumno'){
            $cod = Auth::user()->nroId;
            $semestre = Input::get('semestreMatri');
            $arreglo = Input::get('cargas');
            if (empty($arreglo)) {
                $respuesta['mensaje'] = 'No hay registros para matricular. Ingrese de nuevo';
                $respuesta['error'] = true;
                $respuesta['data'] = '';
                return Redirect::to('alumnoB/registroCT')->with('mensaje',$respuesta['mensaje']);
            }else{
                foreach ($arreglo as $carga) {
                    $carga_acade = $carga;
                    $matricula_ct = DB::select('call insertMatriculaCT(?,?,?)',array($cod,$carga_acade,$semestre));
                    }
                $respuesta['mensaje'] = 'Matrículas registradas correctamente';
                $respuesta['error'] = false;
                return Redirect::to('alumnoB/listaMatriculas/'.$semestre);
            }
        }
    }

    public function listarMatriculasAlumno($semest){
        if(Auth::user()->tipoUsuario == 'Alumno'){
            $cod = Auth::user()->nroId;
            $alumno = DB::table('alumno')->where('id', $cod)->first();
            $matriculas = DB::select('call listarMatriculasCTAlumnoPorSemestre(?,?)',array($cod,$semest));
            return View::make('funcionalumno.listaMatriculasAlumno', compact('alumno'),array('cursos'=>$matriculas));
        }
    }

    public function listaCursosCLdisponibles(){
        $cursos = DB::select('call listar_cursosCL_disponibles()');
        return View::make('funcionalumno.listarCursosLibres',array('cursos'=>$cursos));  
    }

    public function registrarCL($codCarga){
        if(Auth::user()->tipoUsuario == 'Alumno'){
            $cod = Auth::user()->nroId;
            $buscar = DB::select('call buscarMatriculaCL(?,?)', array($cod,$codCarga));
            $lonf = sizeof($buscar);
            if ($lonf > 0) {
                $respuesta['mensaje'] = 'Error!!! La matricula ya existe';
                $respuesta['error'] = true;
                return Redirect::to('alumnoB/lista_cursos')->with('mensaje',$respuesta['mensaje'])->withInput();
            }else{
                $matricula_cl = DB::select('call insertMatriculaCL(?,?)',array($cod,$codCarga));
                $respuesta['mensaje'] = 'Matricula Creada';
                $respuesta['error'] = false;
                $respuesta['data'] = $matricula_cl;
                return Redirect::to('alumnoB/lista_cursos')->with('mensaje',$respuesta['mensaje']);
            }
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

    public function imagen($id)
    {
            $alumno = Alumno::where('id','=',$id)->firstOrFail();
            return View::make('funcionalumno.imagenB',array('alumno'=>$alumno));
    }

    public function uploadImage($id)
    {
        $mensaje = "Ocurrio Error";
        if(Input::file("foto")->isValid())
        {
            $file = Input::file("foto");
            $fileName = Input::file('foto')->getClientOriginalName();
            $alumno = Alumno::where('id','=',$id)->firstOrFail();
            $alumno->foto = md5($id."-".$fileName).'.'.Input::file('foto')->getClientOriginalExtension();
            if($alumno->save())
            {
                Input::file('foto')->move('assets/foto',$alumno->foto);
                $mensaje = "Imagen actualizado";
            }
        }
        return Redirect::to('alumnoB/perfil')->withErrors($mensaje);
    }
}