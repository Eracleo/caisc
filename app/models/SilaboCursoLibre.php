<?php

class SilaboCursoLibre extends Eloquent {

	protected $table = 'detalle_silabus_cl';
	protected $fillable = array('id','codSilabus_cl','capitulo','titulo','objetivos','descripcion','numeroclases','orden','estado','updated_at','created_at');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'capitulo'=>array('required','max:50','min:1'),
				'titulo'=>array('required','max:120','min:5'),
				'numeroclases'=>array('required','max:100','min:1','integer'),
				'orden'=>array('required','max:99999999999','min:1','integer'),
				'objetivos'=>array('required','max:100000','min:5'),
				'descripcion'=>array('required','max:100000','min:5')
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
			$respuesta['data'] = $input;
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
				'capitulo'=>array('required','max:50','min:1'),
				'titulo'=>array('required','max:120','min:5'),
				'numeroclases'=>array('required','max:999','min:1','integer'),
				'orden'=>array('required','max:99999999999','min:1','integer'),
				'objetivos'=>array('required','max:100000','min:5'),
				'descripcion'=>array('required','max:100000','min:5')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
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

