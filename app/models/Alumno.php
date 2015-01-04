<?php
	class Alumno extends Eloquent{
		
	protected $table = 'alumno';
	public $timestamps = false;
	protected $fillable = array('nombre','apellidos','dni','direccion','telefono','email','password','modulo', 'estado', 'codCarrera');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:4','max:30'),
			'apellidos'=>array('required','min:4','max:30'),
			'dni'=>array('required','numeric','digits:8','unique:alumno'),
			'direccion'=>array('required','min:10','max:50'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email','unique:alumno','unique:users'),
			'password'=>array('required','min:6','confirmed')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$input['password'] = Hash::make($input['password']);
			$alumno = static::create($input);
			$respuesta['mensaje'] = 'Alumno Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $alumno;
		}
		return $respuesta;
	}

	public static function editar($obj,$input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:4','max:30'),
			'apellidos'=>array('required','min:4','max:30'),
			'dni'=>array('required','numeric','digits:8'),
			'direccion'=>array('required','min:10','max:50'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$user = User::where('nroId','=',$obj->id)->firstOrFail();
			$obj->nombre = Input::get('nombre');
			$obj->apellidos = Input::get('apellidos');
			$obj->dni = Input::get('dni');
			$obj->direccion = Input::get('direccion');
			$obj->telefono = Input::get('telefono');
			$obj->email = Input::get('email');
			$obj->codCarrera = Input::get('codCarrera');
			$user->email = $obj->email;
			$obj->save();
			$user->save();
			$respuesta['mensaje'] = 'Datos Actualizados';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function updatePassword($obj,$input)
	{
		$input['pAnterior'] = Hash::make($input['pAnterior']);
		$respuesta = array();
		$reglas = array(
			'password'=>array('required','min:6','confirmed','max:12')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$user = User::where('nroId','=',$obj->id)->firstOrFail();
			$obj->password =  Hash::make($input['password']);
			$user->password = $obj->password;
			$obj->save();
			$user->save();
			$respuesta['error'] = false;
			$respuesta['mensaje'] = 'Contraseña Actualizado';
		}
		return $respuesta;
	}
	public static function editarB($obj,$input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:4','max:30'),
			'apellidos'=>array('required','min:4','max:30'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$user = User::where('nroId','=',$obj->id)->firstOrFail();
			$obj->nombre = Input::get('nombre');
			$obj->apellidos = Input::get('apellidos');
			$obj->telefono = Input::get('telefono');
			$obj->email = Input::get('email');
			$user->email = $obj->email;
			$obj->save();
			$user->save();
			$respuesta['mensaje'] = 'Datos Actualizados';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}
?>