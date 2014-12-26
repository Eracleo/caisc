<?php

class SilaboCursoTecnico extends Eloquent {

	protected $table = 'detalle_silabus_ct';
	protected $fillable = array('id','codSilabus_ct','capitulo','titulo','objetivos','descripcion','numeroclases','orden','estado','updated_at','created_at');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'capitulo'=>array('required','max:50'),
				'titulo'=>array('required','max:120'),
				'numeroclases'=>array('required','max:11'),
				'orden'=>array('required','max:11')
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'Datos Ingresados Incorrectamente';
			$respuesta['error'] = true;
			$respuesta['data'] = $input;
		} 
		else
		{
			$nombre = SilabusCT::get()->last();	
			$a = $nombre->id;
			$silabo = new SilaboCursoTecnico;
			$silabo->codSilabus_ct =$a;
			$silabo->capitulo = Input::get('capitulo');
			$silabo->titulo = Input::get('titulo');
			$silabo->objetivos = Input::get('objetivos');			
			$silabo->descripcion = Input::get('descripcion');
			$silabo->numeroclases = Input::get('numeroclases');
			$silabo->orden = Input::get('orden');
			$silabo->estado = 1;
			$silabo->created_at= time();
			$silabo->updated_at = time();
			$silabo->save();			
			$respuesta['mensaje'] = 'Silabo Creado';
			$respuesta['error'] = false;	
			$respuesta['data'] = $silabo;
			
		}
		return $respuesta;
	}

	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
				'capitulo'=>array('required','max:50'),
				'titulo'=>array('required','max:120'),
				'numeroclases'=>array('required','max:11'),
				'orden'=>array('required','max:11')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'Datos Ingresados Incorrectamente';
			$respuesta['error'] = true;
		} 
		else
		{
			$respuesta['mensaje'] = 'Silabo Actualizado';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}
