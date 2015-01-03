<?php

class SilaboCarreraTecnicaController extends BaseController {

	public function nuevo($id)
	{
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.create',array('id'=>$id));
	}
	public function insertar()
	{
			$carga = Input::get('codCargaAcademica_ct');	
			$respuesta = SilaboCursoTecnico::agregar(Input::all());
		 	if($respuesta['error']==true)
			{
				return Redirect::to('SilaboCarreraTecnica/create/'.$carga)->withErrors($respuesta['mensaje'] )->withInput();
			} 
			else 
			{
			return Redirect::to('SilaboCarreraTecnica/index.html')->with('mensaje','Se Creo el Silabo');
			}	
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
		$respuesta = SilaboCursoTecnico::editar(Input::all());
		if($respuesta['error']==true)
		{	
			$id = input::get('id');
			$curso = SilaboCursoTecnico::where('id','=',$id)->firstOrFail();
			return Redirect::to('SilaboCarreraTecnica/updatecID/'.$id)->withErrors($respuesta['mensaje'] )->withInput();
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
	}

	public function CursosDocente()
	{
		if(Auth::user()->tipoUsuario == 'Docente')
		{
			$idDocente = Auth::user()->nroId;
			$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
	      	return View::make("ListarCursos/indexCT", compact('cursos'));
      	}
      	else
      	{
      		return View::make("error.303");
      	}
	}

	public function get_eliminar()
	{
		$datos = SilaboCursoTecnico::where('estado','<>','0')->orderBy('orden','ASC')->paginate(5);
		$curso_cl = SilaboCursoTecnico::where('estado','<>','0')->orderBy('orden','ASC')->get();
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
		$carrera = Carrera::lists('nombre','id');
		$datos = SilaboCursoTecnico::where('estado','<>','0')->orderBy('orden','ASC')->paginate(5);
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.index',compact("datos"),array('carrera'=>$carrera));
	}
	public function listarespecifico($id=null)
	{
		if(Auth::User()->tipoUsuario == 'Docente') //eso es por ah
		{
			$idDocente = Auth::User()->nroId;
			$silabus = SilabusCT::where('codCargaAcademica_ct','=',$id);
			return $silabus;
			$codigo = $silabus->id;
			$datos = SilaboCursoTecnico::where('estado','<>','0')->where('codSilabus_ct','=',$silabus->id)->orderBy('id','ASC')->paginate(5);
			return View::make('Cursos_Carrera_Libre.SilaboCL.index',compact("datos"),array('id'=>$id));

			return View::make("ListarCursos.index",compact('cursos'));
		}
		else
		{return 'acesso restringido solo para docentes';}
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

	public function post_finalizar()
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
				if($silabo->estado == 1)
					$silabo->estado = 2;
				else
				{
					if($silabo->estado ==2)
						$silabo->estado = 1;
					else
						$silabo->estado = 0;

				}	
				$silabo->save();
				return Redirect::to('SilaboCarreraTecnica/index.html');
			} 
			else 
			{
				return Redirect::to('500.html');
			}

		}
	}
}
