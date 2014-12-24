<?php

class PersonalController extends BaseController
{
	public function index($registros = 5)
	{
		$datos = Personal::paginate($registros);
		return View::make('personal.index',compact("datos"));
	}
	public function profile($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if (is_object($personal))
			{
				return View::make('personal.profile',array('personal'=>$personal));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function add()
	{
		$cargos = Cargo::lists('nombre','id');
		return View::make('personal.add',array('cargos'=>$cargos));
	}
	public function insert()
	{
		$respuesta = Personal::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('personal/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('personal')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($id=null)
	{
		if(is_numeric($id))
		{
			$obj= Personal::where('id','=',$id)->firstOrFail();
			return View::make('personal.edit',array('personal'=>$obj));
		}
		return Redirect::to('404.html');
	}
	public function update($id=null)
	{
		if(is_numeric($id))
		{
			$obj = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($obj))
			{
				$respuesta = Personal::editar($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('personal/edit/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('personal/profile/'.$id)->withErrors($respuesta['mensaje']);
			}
		}
		Redirect::to('400.html');
	}
	public function delete($id = null)
	{
		if(is_numeric($id))
		{
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($personal))
			{
				$personal->estado = '0';
				$personal->save();
				return Redirect::to('personal');
			}
		}
		Redirect::to('404.html');
	}
	public function active($id = null)
	{
		if(is_numeric($id))
		{
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($personal))
			{
				$personal->estado = '1';
				$personal->save();
				return Redirect::to('personal');
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
			$obj = Personal::where('id','=',$id)->firstOrFail();
			return View::make('personal.change_pass',array('obj'=>$obj));
		}
	}
	public function passwordUpdate($id=null)
	{
        if (is_numeric($id))
		{
			$obj = Personal::where('id','=',$id)->firstOrFail();
			if (is_object($obj))
			{
				$respuesta = Personal::updatePassword($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('personal/password/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('personal/profile/'.$id)->withErrors($respuesta['mensaje']);
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
			$personal = Personal::where('id','=',$id)->firstOrFail();
			return View::make('personal.imagen',array('personal'=>$personal));
		}
	}
	public function uploadImage($id=null)
	{
		$mensaje = "Ocurrio Error";
		if(Input::file("foto")->isValid())
		{
			$fileName = Input::file('foto')->getClientOriginalName();
			$personal = Personal::where('id','=',$id)->firstOrFail();
			$personal->foto = md5($id."-".$fileName).'.'.Input::file('foto')->getClientOriginalExtension();
			if($personal->save())
			{
				Input::file('foto')->move('assets/foto',$personal->foto);
				$mensaje = "Imagen actualizado";
			}
		}
		return Redirect::to('personal/profile/'.$id)->withErrors($mensaje);
	}
}
