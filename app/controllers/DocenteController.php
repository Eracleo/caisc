

<?php

class DocenteController extends BaseController
{
	public function index($registros=10)
	{
		$datos = Docente::paginate($registros);
		return View::make('docente.index',compact("datos"));
	}
	public function profile($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if (is_object($docente))
			{
				return View::make('docente.profile',array('docente'=>$docente));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function perfil()
	{
		$id = Auth::user()->nroId;
		$docente = Docente::where('id','=',$id)->firstOrFail();
		return View::make('docente.profile',array('docente'=>$docente));
	}
	public function add()
	{
		return View::make('docente.add');
	}
	public function insert()
	{
		$respuesta = Docente::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('docente/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('docentes')->with('mensaje',$respuesta['mensaje']);
		}
	}

	
	public function edit($id=null)
	{
		if(is_numeric($id))
		{
			$docente = Docente::where('id','=',$id)->firstOrFail();
			return View::make('docente.edit',array('docente'=>$docente));
		}
		return Redirect::to('404.html');
	}
	public function update($id=null)
	{
		if(is_numeric($id))
		{
			$obj = Docente::where('id','=',$id)->firstOrFail();
			if(is_object($obj))
			{
				$respuesta = Docente::editar($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('docente/edit/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('docente/profile/'.$id)->withErrors($respuesta['mensaje']);
			}
		}
		Redirect::to('400.html');
	}
	public function delete($id = null)
	{
		if(is_numeric($id))
		{
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if(is_object($docente))
			{
				$docente->estado = '0';
				$docente->save();
				return Redirect::to('docentes');
			}
		}
		Redirect::to('404.html');
	}
	public function active($id = null)
	{
		if(is_numeric($id))
		{
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if(is_object($docente))
			{
				$docente->estado = '1';
				$docente->save();
				return Redirect::to('docentes');
			}
		}
		Redirect::to('404.html');
	}
	public function password($id=null)
	{
		if(is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$obj = Docente::where('id','=',$id)->firstOrFail();
			return View::make('docente.change_pass',array('obj'=>$obj));
		}
	}
	public function passwordUpdate($id=null)
	{
        if (is_numeric($id))
		{
			$obj = Docente::where('id','=',$id)->firstOrFail();
			if (is_object($obj))
			{
				$respuesta = Docente::updatePassword($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('docente/password/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('docente/profile/'.$id)->withErrors($respuesta['mensaje']);
			}
		}
		return Redirect::to('404.html');
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
}
