<?php

class AlumnoController extends BaseController
{
	public function add()
	{
		$carreras = Carrera::lists('nombre','id');
		return View::make('alumno.add', array('carreras'=>$carreras));
	}


	public function insert()
	{
		$respuesta = Alumno::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('alumno/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('alumnos')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function index($registros=15)
	{
		//$cod="1";
		//$datos = Alumno::paginate($registros);
		$carreras = Carrera::all();
		//$alumnos=Alumno::all();
		//$alumnos = Alumno::where('codCarrera','=',$cod)->get();
		$datos = DB::table('alumno')
        				->leftJoin('carrera', 'alumno.codCarrera', '=', 'carrera.id')
        				->select('alumno.id', 'alumno.apellidos', 'alumno.nombre', 'carrera.nombre as carr', 'alumno.dni', 'alumno.estado')
          				->paginate($registros);
		return View::make('alumno.index',compact("datos","carreras"));
	}

	public function perfil()
	{
		$id = Auth::user()->nroId;
		$alumno = Alumno::where('id','=',$id)->firstOrFail();
		return View::make('alumno.perfil',array('alumno'=>$alumno));
	}

	public function edit($cod)
	{
		$carreras = Carrera::lists('nombre','id');
		$alumno = Alumno::where('id','=',$cod)->firstOrFail();
		return View::make('alumno.edit',array('alumno'=>$alumno, 'carreras'=>$carreras));
	}

	public function deshabilitar($cod)
	{
		DB::table('alumno')
        		->where('id', $cod)
        		->update(array('estado' => 0));
		return Redirect::to('alumnos');
	}

	public function habilitar($cod)
	{
		DB::table('alumno')
        		->where('id', $cod)
        		->update(array('estado' => 1));
		return Redirect::to('alumnos');
	}

	public function update($id)
	{
		if(is_numeric($id))
		{
			$obj = Alumno::where('id','=',$id)->firstOrFail();
			if(is_object($obj))
			{
				$respuesta = Alumno::editar($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('alumno/edit/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('alumno/profile/'.$id)->withErrors($respuesta['mensaje']);
			}
		}
		Redirect::to('400.html');
	}

	public function updatePass($id){
		// $alumno = Alumno::where('id', '=',$cod)->firstOrFail();
		// $pass_old = Input::get('pAnterior');
		// $pass = Input::get('password');
		// if(is_object($alumno))
		// {
		// 	$alumno->password = $pass;
		// 	$alumno->save();
		// 	return Redirect::to('alumnos');
		// } else {
		// 	Redirect::to('500.html');
		// }
		if (is_numeric($id))
		{
			$obj = Alumno::where('id','=',$id)->firstOrFail();
			if (is_object($obj))
			{
				$respuesta = Alumno::updatePassword($obj,Input::all());
				if($respuesta['error']==true)
				{
					return Redirect::to('alumno/change-pass/'.$id)->withErrors($respuesta['mensaje'])->withInput();
				}
				return Redirect::to('alumno/profile/'.$id)->withErrors($respuesta['mensaje']);
			}
		}
		return Redirect::to('404.html');
	}

	public function profile($cod)
	{
		$alumno = Alumno::where('id','=',$cod)->firstOrFail();
		if (is_object($alumno))
		{
			return View::make('alumno.profile',array('alumno'=>$alumno));
		} else {
			return Redirect::to('404.html');
		}
	}

	public function imagen($id)
	{
			$alumno = Alumno::where('id','=',$id)->firstOrFail();
			return View::make('alumno.imagen',array('alumno'=>$alumno));
	}

	public function uploadImage($id)
	{
		$mensaje = "Ocurrio Error";
		if(Input::file("foto")->isValid())
		{
			$file = Input::file("foto");
			$fileName = Input::file('foto')->getClientOriginalName();
			$alumno = Alumno::where('id','=',$id)->firstOrFail();
			$alumno->foto = md5($id."-".$fileName).'.'.Input::file('foto')->getClientOriginalExtension();
			if($alumno->save())
			{
				Input::file('foto')->move('assets/foto',$alumno->foto);
				$mensaje = "Imagen actualizado";
			}
		}
		return Redirect::to('alumno/profile/'.$id)->withErrors($mensaje);
	}

	public function changePass($id = null)
	{
        if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$alumno = Alumno::where('id','=',$id)->firstOrFail();
			if (is_object($alumno))
			{
				$alumno->pasword = Input::get('password');
				return View::make('alumno.change_pass',array('alumno'=>$alumno));
			} else {
				return Redirect::to('404.html');
			}
		}

	}
}