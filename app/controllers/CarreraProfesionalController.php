

<?php

class CarreraProfesionalController extends BaseController
{
	public function index($registros=5)
	{
		$datos = Carrera::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$carrera = Carrera::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('CarreraProfesional.index',compact("datos"),array('carrera'=>$carrera));
	}
	public function profile($id = null)
	{
		if (is_null($id) )
		{
			return Redirect::to('404.html');
		} else {
			$carrera = Carrera::where('id','=',$id)->firstOrFail();
			if (is_object($carrera))
			{
				return View::make('CarreraProfesional.profile',array('carrera'=>$carrera));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function add()
	{
		return View::make('CarreraProfesional.add');
	}
	public function insert()
	{
		$respuesta = Carrera::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('CarreraProfesional/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('CarreraProfesional')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($id=null)
	{
		if(is_null($id) )
		{
			return Redirect::to('404.html');
		} else {
			$carrera = Carrera::where('id','=',$id)->firstOrFail();
			return View::make('CarreraProfesional.edit',array('carrera'=>$carrera));
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
			$carrera = Carrera::where('id','=',$id)->firstOrFail();
			return View::make('CarreraProfesional.editconID',array('carrera'=>$carrera));
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
			$carrera = Carrera::where('id','=',$cod)->firstOrFail();
			if(is_object($carrera))
			{
				$carrera->id = Input::get('id');
				$carrera->nombre = Input::get('nombre');
				$carrera->descripcion = Input::get('descripcion');
				$carrera->updated_at = time();
				$carrera->save();
				return Redirect::to('CarreraProfesional');
			} else {
				Redirect::to('500.html');
			}
		}
	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$carrera = Carrera::where('id','=',$id)->firstOrFail();
			return View::make('CarreraProfesional.post_eliminar',array('carrera'=>$carrera));		
		}
	}
	public function update($id=0)
	{
		$respuesta = Docente::editar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('docente/edit/'.$id)->withErrors($respuesta['mensaje'] )->withInput();
		}
		else
		{
			if($id<1)
			{
				Redirect::to('404.html');
			} else {
				$docente = Docente::where('id','=',$id)->firstOrFail();
				if(is_object($docente))
				{
					$docente->nombre = Input::get('nombre');
					$docente->apellidos = Input::get('apellidos');
					$docente->dni = Input::get('dni');
					$docente->email = Input::get('email');
					$docente->telefono = Input::get('telefono');
					$docente->save();
					return Redirect::to('docente/profile/'.$id);
				} else {
					Redirect::to('500.html');
				}
			}
		}
	}
	public function delete($id = null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} else {
			$carrera = Carrera::where('id','=',$id)->firstOrFail();
			if(is_object($carrera))
			{
				$carrera->estado=0;
				$carrera->save();
				return Redirect::to('CarreraProfesional');
			}
		}
	}
	public function imagen($id=null)
	{
		if(is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			return View::make('docente.imagen',array('docente'=>$docente));
		}
	}
	public function uploadImage($id=null)
	{
		$mensaje = "Ocurrio Error";
		if(Input::file("foto")->isValid())
		{
			$file = Input::file("foto");
			$fileName = Input::file('foto')->getClientOriginalName();
			$docente = Docente::where('id','=',$id)->firstOrFail();
			$docente->foto = md5($id."-".$fileName).'.'.Input::file('foto')->getClientOriginalExtension();
			if($docente->save())
			{
				Input::file('foto')->move('assets/foto',$docente->foto);
				$mensaje = "Imagen actualizado";
			}
		}
		return Redirect::to('docente/profile/'.$id)->withErrors($mensaje);
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
			$carrera = Carrera::find($cod);
			if(is_object($carrera))
			{
				$carrera->estado = 0;
				$carrera->save();
				return Redirect::to('CarreraProfesional');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}
}
