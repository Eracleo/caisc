<?php

class PersonalController extends BaseController
{
	public function index($registros = 5)
	{
		$datos = Personal::paginate($registros);
		$personal = Personal::all();
		return View::make('personal.index',compact("datos"),array('personal'=>$personal));
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
		$cargos = array('1'=>'Tesorero');
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
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			return View::make('personal.edit',array('personal'=>$personal));
		}
	}
	public function update($id = null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($personal))
			{
				$personal->nombre = Input::get('nombre');
				$personal->apellidos = Input::get('apellidos');
				$personal->email = Input::get('email');
				$personal->telefono = Input::get('telefono');
				$personal->save();
				return Redirect::to('personal');
			} else {
				Redirect::to('500.html');
			}
		}
	}
	public function delete($id = null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($personal))
			{
				$personal->estado = '0';
				$personal->save();
				return Redirect::to('personal');
			}
		}
	}
	public function changePassPersonal($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if (is_object($personal))
			{
				return View::make('personal.change_pass_personal',array('personal'=>$personal));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
}
