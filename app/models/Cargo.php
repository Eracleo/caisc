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
}

