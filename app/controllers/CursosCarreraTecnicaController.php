<?php

class CursosCarreraTecnicaController extends BaseController{
	
	public function nuevo()
	{
		$carrera = Carrera::lists('nombre','id');
		$modulo = Modulo::lists('nombre','id');
		return View::make('Cursos_Carrera_Tecnica.create',array('carrera'=>$carrera,'modulo'=>$modulo));
	}
	public function insertar()
	{	
		$respuesta = CursoTecnico::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('CursosTecnica/create.html')->withErrors($respuesta['mensaje'] )->withInput();
		} 
		else 
		{
			return Redirect::to('CursosTecnica/index.html')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function listar()
	{ 
		$carrera = Carrera::lists('nombre','id');
		$modulo = Modulo::lists('nombre','id');
		$datos = CursoTecnico::where('estado','=','1')->orderBy('id','ASC')->paginate(10);		
		return View::make('Cursos_Carrera_Tecnica.index',compact("datos"),array('carrera'=>$carrera,'modulo'=>$modulo));
	}
	public function listarCarrera()
	{
		$idcarrera = Input::get('codCarrera');
		$carrera = Carrera::lists('nombre','id');
		$modulo = Modulo::lists('nombre','id');
		$datos = CursoTecnico::where('codCarrera','=',$idcarrera)->where('estado','=','1')->orderBy('id','ASC')->paginate(10);		
		return View::make("Cursos_Carrera_Tecnica.index",compact('datos'),array('carrera'=>$carrera,'modulo'=>$modulo));
	}
	public function listarModulo()
	{
		$idModulo = Input::get('modulo');
		$carrera = Carrera::lists('nombre','id');
		$modulo = Modulo::lists('nombre','id');
		$datos = CursoTecnico::where('modulo','=',$idModulo)->where('estado','=','1')->orderBy('id','ASC')->paginate(10);		
		return View::make("Cursos_Carrera_Tecnica.index",compact('datos'),array('carrera'=>$carrera,'modulo'=>$modulo));
	}
	public function listarAmbos()
	{
		$idModulo = Input::get('modulo');
		$idcarrera = Input::get('codCarrera');
		$carrera = Carrera::lists('nombre','id');
		$modulo = Modulo::lists('nombre','id');
		$datos = CursoTecnico::where('modulo','=',$idModulo)->where('codCarrera','=',$idcarrera)->where('estado','=','1')->orderBy('id','ASC')->paginate(10);		
		return View::make("Cursos_Carrera_Tecnica.index",compact('datos'),array('carrera'=>$carrera,'modulo'=>$modulo));
	}
	public function ActualizarConID($id)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$carrera = Carrera::lists('nombre','id');
			$curso = CursoTecnico::where('id','=',$id)->firstOrFail();
			$modulo = Modulo::lists('nombre','id');
			return View::make('Cursos_Carrera_Tecnica.editconID',array('curso_ct'=>$curso,'carrera'=>$carrera,'modulo'=>$modulo));
		}
	}
	public function post_actualizar()
	{
		$respuesta = CursoTecnico::editar(Input::all());
		if($respuesta['error']==true)
		{	$id = input::get('id');
			$curso = CursoTecnico::where('id','=',$id)->firstOrFail();
			return Redirect::to('CursosTecnica/updatecID/'.$id)->withErrors($respuesta['mensaje'] )->withInput();
			//return View::make('Cursos_Carrera_Libre.editconID',array('curso_cl'=>$curso))->withErrors($respuesta['mensaje'] );
		}
		else
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
					$curso->nombre = Input::get('nombre');
					$curso->modulo = Input::get('modulo');
					$curso->codCarrera = Input::get('codCarrera');
					$curso->horas_academicas = Input::get('horas_academicas');
					$curso->estado = 1;
					$curso->updated_at = time();
					$curso->save();
					return Redirect::to('CursosTecnica/index.html');
				} else {
					Redirect::to('500.html');
				}
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

