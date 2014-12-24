<?php

class SilaboCarreraTecnicaController extends BaseController {

	public function nuevo($id)
	{
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.create',array('id'=>$id));
	}
	public function insertar()
	{	
		//$respuesta = SilaboCursoTecnico::agregar(Input::all());
		$silabo = SilabusCT::agregar(Input::all());
		$nombre = SilabusCT::get()->last();	
		$a = $nombre->id;
		if($silabo['error']==true)
		{
			return Redirect::to('SilaboCarreraTecnica/create/')->with('mensaje',$silabo['mensaje']);
		}
		else
		 {		 		
			$silaboaux = new SilaboCursoTecnico;
			$silaboaux->codSilabus_ct =$a;
			$silaboaux->capitulo = Input::get('capitulo');
			$silaboaux->titulo = Input::get('titulo');
			$silaboaux->objetivos = Input::get('objetivos');			
			$silaboaux->descripcion = Input::get('descripcion');
			$silaboaux->numeroclases = Input::get('numeroclases');
			$silaboaux->orden = Input::get('orden');

			$silaboaux->save();
		 	//$respuesta = SilaboCursoLibre::agregar($silaboaux);
			//if($respuesta['error']==true)
			//{
			//	return Redirect::to('SilaboCarreraLibre/create/')->with('mensaje',$respuesta['mensaje']);
			//} 
			//else 
			//{
			return Redirect::to('SilaboCarreraTecnica/index.html')->with('mensaje','se creo el silabo');
			//}
		}		
	}

	public function ActualizarBuscandoNombre()
	{
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.edit');
	}
	public function ActualizarConID($id)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoTecnico::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Tecnica.SilaboCT.edit',array('silabocurso_ct'=>$silabo));
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
			$silabo = SilaboCursoTecnico::where('id','=',$cod)->firstOrFail();
			if(is_object($silabo))
			{
				$silabo->capitulo = Input::get('capitulo');
				$silabo->titulo = Input::get('titulo');
				$silabo->objetivos = Input::get('objetivos');	
				$silabo->numeroclases = Input::get('numeroclases');
				$silabo->descripcion = Input::get('descripcion');
				$silabo->orden = Input::get('orden');
				$silabo->updated_at = time();
				$silabo->save();
				return Redirect::to('SilaboCarreraTecnica/index.html');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}

	public function get_eliminar()
	{
		$datos = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$curso_cl = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.delete',compact("datos"),array('id'=>$curso_cl));

	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoTecnico::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Tecnica.SilaboCT.post_eliminar',array('silabocurso_ct'=>$silabo));
			
		}
	}
	public function eliminando()
	{
		$cod=Input::get('id');
		
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoTecnico::find($cod);
			if(is_object($silabo))
			{
				$silabo->estado = 0;
				$silabo->save();
				return Redirect::to('SilaboCarreraTecnica/index.html');
			} 
			else 
			{
				return Redirect::to('500.html');
				
			}

		}
	}
	public function listar()
	{
		$datos = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','ASC')->paginate(10);
		$silabocurso_ct = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','ASC')->get();
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.index',compact("datos"),array('id'=>$silabocurso_ct));
	}

	public function detalle($id)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoTecnico::where('id','=',$id)->firstOrFail();
			if (is_object($silabo))
			{
				return View::make('Cursos_Carrera_Tecnica.SilaboCT.detalles',array('silabo'=>$silabo));
			} 
			else 
			{
				return Redirect::to('404.html');
			}
		}
	}
	public function finalizado()
	{
		$cod=Input::get('id');
		
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoLibre::find($cod);
			if(is_object($silabo))
			{
				$silabo->estado = 2;
				$silabo->save();
				return Redirect::to('SilaboCarreraLibre/index.html');
			} 
			else 
			{
				return Redirect::to('500.html');
			}

		}
	}
}
