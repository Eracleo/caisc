<?php
class Aula extends Eloquent {
	protected $table = 'aula';
	protected $fillable = array('codAula','capacidad','estado');
	public $timestamps = false;
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'codAula'=>array('required','min:3'),
			'capacidad'=>array('required'),
		);	
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$aula = new Aula;
			$aula->codAula = Input::get('codAula');
			$aula->capacidad = Input::get('capacidad');
			$aula->estado = 1;
			Aula::where(
            		[
                		'codAula' => Input::get('codAula'),
            		]
        		)->update(
            		[
                		'capacidad' => Input::get('capacidad'),
                		'estado' => 1,
            		]
        		);
        	$aux=Aula::where('codAula','=',Input::get('codAula'))->get();
			if($aux->isEmpty())
			{
				$aula->save();
				$respuesta['mensaje'] = 'Aula Creada';
				$respuesta['error'] = false;
				$respuesta['data'] = $aula;
			}
			else
			{
				$respuesta['mensaje'] = 'Se creo la Aula con exito';
				$respuesta['error'] = false;
				$respuesta['data'] = $aux;
			}
		}
		return $respuesta;
	}

	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
			'capacidad'=>array('required')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'Datos ingresados incorrectamente, ingrese datos correctos';
			$respuesta['error'] = true;
		} else
		{
			$respuesta['mensaje'] = 'Aula Actualizada';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}
