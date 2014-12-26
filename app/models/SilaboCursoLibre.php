<?php

class SilaboCursoLibre extends Eloquent {

	protected $table = 'detalle_silabus_cl';
	protected $fillable = array('id','codSilabus_cl','capitulo','titulo','objetivos','descripcion','numeroclases','orden','estado','updated_at','created_at');

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
			$nombre = SilabusCL::get()->last();	
			$a = $nombre->id;
			$silaboaux = new SilaboCursoLibre;
			$silaboaux->codSilabus_cl =$a;
			$silaboaux->capitulo = Input::get('capitulo');
			$silaboaux->titulo = Input::get('titulo');
			$silaboaux->objetivos = Input::get('objetivos');			
			$silaboaux->descripcion = Input::get('descripcion');
			$silaboaux->numeroclases = Input::get('numeroclases');
			$silaboaux->orden = Input::get('orden');
			$silaboaux->estado = 1;
			$silaboaux->created_at= time();
			$silaboaux->updated_at = time();
			$silaboaux->save();
			
			$respuesta['mensaje'] = 'Silabo Creado';
			$respuesta['error'] = false;		

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

