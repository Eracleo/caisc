<?php

class CursosCarreraTecnicaController extends BaseController{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function nuevo()
	{
		$carrera = Carrera::lists('nombre','id');
		return View::make('Cursos_Carrera_Tecnica.create',array('carrera'=>$carrera));
	}
	public function insertar()
	{	
		$respuesta = CursoTecnico::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('CursosTecnica/create.html')->with('mensaje',$respuesta['mensaje']);
		} 
		else 
		{
			return Redirect::to('CursosTecnica/index.html')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function listar()
	{ 
		$datos = CursoTecnico::where('estado','=','1')->orderBy('id','ASC')->paginate(10);		
		$curso_ct = CursoTecnico::where('estado','=','1')->orderBy('id','ASC')->get();
		return View::make('Cursos_Carrera_Tecnica.index',compact("datos"),array('curso_ct'=>$curso_ct));
	}

	public function ActualizarBuscandoNombre()
	{
		return View::make('Cursos_Carrera_Tecnica.edit');
	}
	public function ActualizarConID($id)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$curso = CursoTecnico::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Tecnica.editconID',array('curso_ct'=>$curso));
		}
	}
	public function post_actualizar()
	{
		$cod=Input::get('id');

		if(is_null($cod))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$curso = CursoTecnico::where('id','=',$cod)->firstOrFail();
			if(is_object($curso))
			{
				$curso->codigo = Input::get('codigo');
				$curso->nombre = Input::get('nombre');
				$curso->modulo = Input::get('modulo');
				$curso->horas_academicas = Input::get('horas_academicas');
				$curso->estado = 1;
				//$curso->codCarrera = Input::get('codCarrera');
				$curso->updated_at = time();
				$curso->save();
				return Redirect::to('CursosTecnica/index.html');
			} else {
				Redirect::to('500.html');
			}
		}
	}

	public function get_eliminar()
	{
		$datos = CursoTecnico::where('estado','=','1')->orderBy('id','ASC')->paginate(10);
		$curso_ct = CursoTecnico::where('estado','=','1')->orderBy('id','ASC')->get();
		return View::make('Cursos_Carrera_Tecnica.delete',compact("datos"),array('curso_ct'=>$curso_ct));

	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$curso = CursoTecnico::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Tecnica.post_eliminar',array('curso_ct'=>$curso));		
		}
	}

	public function eliminando()
	{
		$cod=Input::get('id');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$curso = CursoTecnico::find($cod);
			if(is_object($curso))
			{
				$curso->estado = 0;
				$curso->save();
				return Redirect::to('CursosTecnica/index.html');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}
}

