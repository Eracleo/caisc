<?php
class Carrera extends Eloquent {
	protected $table = 'carrera';
	protected $fillable = array('id','nombre','descripcion','estado','updated_at','created_at');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:3'),
			'id'=>array('required','min:2','unique:carrera'),
			'descripcion'=>array('required','min:3')
		);	
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{

			//$carrera = static::create($input);

			$carrera = new Carrera;
			$carrera->id = Input::get('id');
			$carrera->nombre = Input::get('nombre');
			$carrera->descripcion = Input::get('descripcion');
			$carrera->estado = 1;
			$carrera->created_at= time();
			$carrera->updated_at = time();
			$carrera->save();
			$respuesta['mensaje'] = 'Carrera Profesional Creada';
			$respuesta['error'] = false;
			$respuesta['data'] = $carrera;
		}
		return $respuesta;
	}


	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:3'),
			'apellidos'=>array('required','min:3'),
			'dni'=>array('required','numeric','digits:8','unique:carrera'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$respuesta['mensaje'] = 'Docente Actualizado';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function Cambiar($input)
	{
		$respuesta = array();
		$reglas = array(
			'password'=>array('required','min:6','confirmed')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}

