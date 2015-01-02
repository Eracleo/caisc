<?php

class AulaController extends BaseController
{
	public function index($registros=10)
	{
		$datos = Aula::where('estado','=','1')->orderBy('codAula','DESC')->paginate($registros);
		$aula = Aula::where('estado','=','1')->orderBy('codAula','DESC')->get();
		return View::make('Aula.index',compact("datos"),array('codAula'=>$aula));
	}
	public function profile($id = null)
	{
		if (is_null($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Aula::where('codAula','=',$id)->firstOrFail();
			if (is_object($docente))
			{
				return View::make('Aula.profile',array('aula'=>$docente));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function add()
	{
		return View::make('Aula.add');
	}
	public function insert()
	{
		$respuesta = Aula::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('Aula/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('Aula')->with('mensaje',$respuesta['mensaje']);
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
			$aula = Aula::where('codAula','=',$id)->firstOrFail();
			return View::make('Aula.editconID',array('aula'=>$aula));
		}
	}
	public function post_actualizar()
	{

		$respuesta = Aula::editar(Input::all());
		if($respuesta['error']==true)
		{	$id = input::get('codAula');
			$aula = Aula::where('codAula','=',$id)->firstOrFail();
			return Redirect::to('Aula/updatecID/'.$id)->with('mensaje',$respuesta['mensaje'])->withInput();
		}
		else
		{
			$cod=Input::get('codAula');
			if(is_null($cod))
			{
				Redirect::to('404.html');
			} 
			else 
			{
				Aula::where(
            		[
                		'codAula' => $cod,
            		]
        		)->update(
            		[
                		'capacidad' => Input::get('capacidad'),
            		]
        		);
				return Redirect::to('Aula');

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
			$aula = Aula::where('codAula','=',$id)->firstOrFail();
			return View::make('Aula.post_eliminar',array('aula'=>$aula));
		}
	}
	public function edit($id=null)
	{
		if(is_numeric($id))
		{
			$docente = Docente::where('codAula','=',$id)->firstOrFail();
			return View::make('Aula.edit',array('aula'=>$docente));
		}
		return Redirect::to('404.html');
	}
	public function update($id=null)
	{
		if(is_numeric($id))
		{
			$obj = Aula::where('codAula','=',$id)->firstOrFail();
			if(is_object($obj))
			{
				$respuesta = Aula::editar($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('Aula/edit/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('Aula/profile/'.$id)->withErrors($respuesta['mensaje']);
			}
		}
		Redirect::to('400.html');
	}
	public function delete($id = null)
	{
		if(is_numeric($id))
		{
			$aula = Aula::where('codAula','=',$id)->firstOrFail();
			if(is_object($aula))
			{
				$aula->estado = '0';
				$aula->save();
				return Redirect::to('Aula');
			}
		}
		Redirect::to('404.html');
	}
	public function active($id = null)
	{
		if(is_numeric($id))
		{
			$aula = Aula::where('codAula','=',$id)->firstOrFail();
			if(is_object($aula))
			{
				$aula->estado = '1';
				$aula->save();
				return Redirect::to('Aula');
			}
		}
		Redirect::to('404.html');
	}
	public function eliminando()
	{	

		$cod=Input::get('codAula');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			//$aula = Aula::where('codAula','=',$cod)->firstOrFail();
			Aula::where(
            	[
                	'codAula' => $cod,
            	]
        	)->update(
            	[
                	'estado' => 0,
            	]
        	);
			return Redirect::to('Aula');

		}
	}
	public function listar()
	{
		$datos = Aula::where('estado','=','1')->orderBy('codAula','ASC')->paginate(5);
		$aula = Aula::where('estado','=','1')->orderBy('codAula','ASC')->get();
		return View::make('Aula.index',compact("datos"),array('codAula'=>$aula));
	}
}
