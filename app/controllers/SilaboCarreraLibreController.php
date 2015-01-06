<?php

class SilaboCarreraLibreController extends BaseController {

	public function nuevo($id)
	{
		return View::make('Cursos_Carrera_Libre.SilaboCL.create',array('id'=>$id));
	}
	public function insertar()
	{
		$carga = Input::get('codCargaAcademica_cl');
		$respuesta = SilaboCursoLibre::agregar(Input::all());

		if($respuesta['error']==true)
		{
			return Redirect::to('SilaboCarreraLibre/create/'.$carga)->withErrors($respuesta['mensaje'] )->withInput();
		}
		else
		{
			return Redirect::to('SilaboCarreraLibre/index.html')->with('mensaje',$respuesta['mensaje']);
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
			$silabo = SilaboCursoLibre::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Libre.SilaboCL.edit',array('silabocurso_cl'=>$silabo));
		}
	}
	public function post_actualizar()
	{
		$respuesta = SilaboCursoLibre::editar(Input::all());
		if($respuesta['error']==true)
		{
			$id = input::get('id');
			$curso = SilaboCursoLibre::where('id','=',$id)->firstOrFail();
			return Redirect::to('SilaboCarreraLibre/updatecID/'.$id)->withErrors($respuesta['mensaje'] )->withInput();
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
				$silabo = SilaboCursoLibre::where('id','=',$cod)->firstOrFail();
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
					return Redirect::to('SilaboCarreraLibre/index.html')->with('mensaje',$respuesta['mensaje']);
				}
				else
				{
					Redirect::to('500.html');
				}
			}
		}
	}

	public function get_eliminar()
	{
		$datos = SilaboCursoLibre::where('estado','<>','0')->orderBy('orden','ASC')->paginate(5);
		$curso_cl = SilaboCursoLibre::where('estado','<>','0')->orderBy('orden','ASC')->get();
		return View::make('Cursos_Carrera_Libre.SilaboCL.delete',compact("datos"),array('id'=>$curso_cl));

	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		}
		else
		{
			$silabo = SilaboCursoLibre::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Libre.SilaboCL.post_eliminar',array('silabocurso_cl'=>$silabo));

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
			$silabo = SilaboCursoLibre::find($cod);
			if(is_object($silabo))
			{
				$silabo->estado = 0;
				$silabo->save();
				return Redirect::to('SilaboCarreraLibre/index.html');
			}
			else
			{
				return Redirect::to('500.html');

			}

		}
	}
	public function listar()
	{
		$datos = SilaboCursoLibre::where('estado','<>','0')->orderBy('id','ASC')->paginate(5);
		$silabocurso_cl = SilaboCursoLibre::where('estado','<>','0')->orderBy('id','ASC')->get();
		return View::make('Cursos_Carrera_Libre.SilaboCL.index',compact("datos"),array('id'=>$silabocurso_cl));
	}

	public function listarespecifico($id=null)
	{
		if(Auth::User()->tipoUsuario == 'Docente') //eso es por ah
		{
			$idDocente = Auth::User()->nroId;
			$datos = DB::table('silabus_cl')->join('detalle_silabus_cl','detalle_silabus_cl.codSilabus_cl','=','silabus_cl.id')->where('silabus_cl.codCargaAcademica_cl','=',$id)->where('estado','<>','0')->orderBy('orden','ASC')->paginate(5);
			return View::make('Cursos_Carrera_Libre.SilaboCL.index',compact("datos"),array('id'=>$id));
		}
		else
		{
			return 'acesso restringido solo para docentes';
		}
	}
	public function detalle($id)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		}
		else
		{
			$silabo = SilaboCursoLibre::where('id','=',$id)->firstOrFail();
			if (is_object($silabo))
			{
				return View::make('Cursos_Carrera_Libre.SilaboCL.detalles',array('silabo'=>$silabo));
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
			$silabo = SilaboCursoLibre::find($cod);
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
				return Redirect::to('SilaboCarreraLibre/index.html');
			}
			else
			{
				return Redirect::to('500.html');
			}

		}
	}
}
