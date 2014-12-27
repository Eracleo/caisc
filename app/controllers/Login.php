<?php

class Login extends BaseController{

	public function postUser()
	{
		//get POST data
		$userdata = array(
			'email' => Input::get('email'),
			'password'=> Input::get('pass')
		);

		if(Auth::attempt($userdata))
		{
			$ird = Auth::user()->getnroId();
			$tipoUsuario = Auth::user()->gettipoUsuario();
			if($tipoUsuario == "Docente")
			{
				return Redirect::to('docente')->with('message-success',"Bienvenido...");
			}
			else
			{
				if($tipoUsuario=="Personal")
				{
					return Redirect::to('personal')->with('message-success',"Bienvenido...");
				}
				return Redirect::to('alumno')->with('message-success',"Bienvenido...");
			}
		}
		else
		{
			return Redirect::to('/')->with('message-danger',"Error Datos incorrectos ingrese nuevamente!!!");
		}
	}
}