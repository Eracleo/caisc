
<?php

class CarreraProfesionalController extends BaseController
{
	public function index($registros=10)
	{

		$datos = Carrera::where('estado','=','1')->orderBy('id','DESC')->paginate($registros);
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
		$respuesta = Carrera::editar(Input::all());
		if($respuesta['error']==true)
		{	$id = input::get('id');
			$carrera = Carrera::where('id','=',$id)->firstOrFail();
			return Redirect::to('CarreraProfesional/updatecID/'.$id)->withErrors($respuesta['mensaje'] )->withInput();
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
				$carrera = Carrera::where('id','=',$cod)->firstOrFail();
				if(is_object($carrera))
				{
					$carrera->nombre = Input::get('nombre');
					$carrera->descripcion = Input::get('descripcion');
					$carrera->updated_at = time();
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
