<?php

class SilabusCL extends Eloquent {

	protected $table = 'silabus_cl';
	protected $fillable = array('id','codCargaAcademica_cl');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'codCargaAcademica_cl'=>array('required','max:20'),
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'Exite un problema con carga academica';
			$respuesta['error'] = true;
		} 
		else
		{
			$silabo = new SilabusCL;
			$silabo->codCargaAcademica_cl = Input::get('codCargaAcademica_cl');
			$silabo->created_at= time();
			$silabo->updated_at = time();
			//$curso->save();
			if ($silabo->save()) 
			{
				$respuesta['mensaje'] = 'Silabo Creado';
				$respuesta['error'] = false;
				$respuesta['data'] = $silabo;
			}
			else 
			{
				$respuesta['mensaje'] = $validador;
				$respuesta['error'] = true;
				$respuesta['data'] = $silabo;
			}
			
			
		}
		return $respuesta;
	}
}
