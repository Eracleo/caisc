<?php

class MatriculaCT extends Eloquent {

	protected $table = 'matricula_ct';
	protected $fillable = array('id','codAlumno','codCargaAcademica_ct','updated_at','created_up');

	public static function agregar($input) {
		$respuesta = array();
		$reglas = array(
			'codAlumno'=>array('required','max:10'),
			'codCargaAcademica_ct'=>array('required','max:10'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else{
			$matricula_ct = static::create($input);
			$respuesta['mensaje'] = 'Matricula Creada';
			$respuesta['error'] = false;
			$respuesta['data'] = $matricula_ct;
		}
		return $respuesta;
	}
}