<?php

class Cargo extends Eloquent {

	protected $table = 'cargo';
	protected $fillable = array('id','nombre','privilegios','descripcion');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','max:20'),
			'privilegios'=>array('required','max:20'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$cargo = static::create($input);
			$respuesta['mensaje'] = 'Cargo Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $cargo;
		}
		return $respuesta;
	}
	public static function editar($obj,$input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','max:20'),
			'privilegios'=>array('required','max:20'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$obj->nombre = Input::get('nombre');
			$obj->privilegios = Input::get('privilegios');
			$obj->descripcion = Input::get('descripcion');
			$obj->save();
			$respuesta['mensaje'] = 'Datos Actualizados';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
	public function getNombre()
	{
	  return $this->nombre;
	}
}

