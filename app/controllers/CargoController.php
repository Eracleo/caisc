<?php

class CargoController extends BaseController
{
	public function index()
	{
		$cargos = Cargo::all();
		return View::make('personal.cargo.index',array('cargos'=>$cargos));
	}
	public function add()
	{
		return View::make('personal.cargo.add');
	}
	public function insert()
	{
		$respuesta = Cargo::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('personal/cargo/add')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('personal/cargos')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($id=null)
	{
		if(is_numeric($id))
		{
			$cargos = Cargo::where('id','=',$id)->firstOrFail();
			return View::make('personal.cargo.edit',array('cargo'=>$cargos));
		}
		return Redirect::to('404.html');
	}
	public function update($id=null)
	{
		if(is_numeric($id))
		{
			$obj = Cargo::where('id','=',$id)->firstOrFail();
			if(is_object($obj))
			{
				$respuesta = Cargo::editar($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('personal/cargo/edit/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('personal/cargos')->withErrors($respuesta['mensaje']);
			}
		}
		Redirect::to('400.html');
	}
	public function delete($id = null)
	{
		if(is_numeric($id))
		{
			$cargo = Cargo::where('id','=',$id)->firstOrFail();
			if(is_object($cargo))
			{
				$cargo->estado = '0';
				$cargo->save();
				return Redirect::to('personal/cargos');
			}
		}
		Redirect::to('404.html');
	}
	public function active($id = null)
	{
		if(is_numeric($id))
		{
			$cargo = Cargo::where('id','=',$id)->firstOrFail();
			if(is_object($cargo))
			{
				$cargo->estado = '1';
				$cargo->save();
				return Redirect::to('personal/cargos');
			}
		}
		Redirect::to('404.html');
	}


}
