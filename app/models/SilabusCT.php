<?php

class SilabusCT extends Eloquent {

	protected $table = 'silabus_ct';
	protected $fillable = array('id','codCargaAcademica_ct');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'codCargaAcademica_ct'=>array('required','integer'),
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'DATOS INGRESADOS INCORRECTAMENTE';
			$respuesta['error'] = true;
		} 
		else
		{
			$silabo = new SilabusCT;
			$silabo->codCargaAcademica_ct = Input::get('codCargaAcademica_ct');
			$silabo->created_at= time();
			$silabo->updated_at = time();
			if ($silabo->save()) 
			{
				$respuesta['mensaje'] = 'Silabo Creado';
				$respuesta['error'] = false;
				$respuesta['data'] = $silabo;
			}
			else 
			{
				$respuesta['mensaje'] = 'DATOS INCORRECTOS';
				$respuesta['error'] = true;
				$respuesta['data'] = $silabo;
			}
			
		}
		return $respuesta;
	}
	
}
