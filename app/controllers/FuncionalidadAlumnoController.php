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