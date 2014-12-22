<?php

class CursosCarreraLibreController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function nuevo()
	{
		return View::make('Cursos_Carrera_Libre.create');
	}
	public function insertar()
	{	
		$respuesta = CursoLibre::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('CursosLibres/create.html')->with('mensaje',$respuesta['mensaje'])->withInput();
		} 
		else 
		{
			return Redirect::to('CursosLibres/index.html')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function ActualizarBuscandoNombre()
	{
		return View::make('Cursos_Carrera_Libre.edit');
	}
	public function ActualizarConID($id)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$curso = CursoLibre::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Libre.editconID',array('curso_cl'=>$curso));
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
			$curso = CursoLibre::where('id','=',$cod)->firstOrFail();
			if(is_object($curso))
			{
				
				$curso->codigo = Input::get('codigo');
				$curso->nombre = Input::get('nombre');
				$curso->horas_academicas = Input::get('horas_academicas');
				$curso->updated_at = time();
				$curso->save();
				return Redirect::to('CursosLibres/index.html');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}

	public function get_eliminar()
	{
		$datos = CursoLibre::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$curso_cl = CursoLibre::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('Cursos_Carrera_Libre.delete',compact("datos"),array('id'=>$curso_cl));

	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$curso = CursoLibre::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Libre.post_eliminar',array('curso_cl'=>$curso));
			
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
			$curso = CursoLibre::find($cod);
			if(is_object($curso))
			{
				$curso->estado = 0;
				$curso->save();
				return Redirect::to('CursosLibres/index.html');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}
	public function listar()
	{
		$datos = CursoLibre::where('estado','=','1')->orderBy('id','ASC')->paginate(10);
		$curso_cl = CursoLibre::where('estado','=','1')->orderBy('id','ASC')->get();
		return View::make('Cursos_Carrera_Libre.index',compact("datos"),array('id'=>$curso_cl));
	}
}
