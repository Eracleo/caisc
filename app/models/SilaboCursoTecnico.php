<?php

class SilaboCursoTecnico extends Eloquent {

	protected $table = 'detalle_silabus_ct';
	protected $fillable = array('id','codSilabus_ct','capitulo','titulo','objetivos','descripcion','numeroclases','orden','estado','updated_at','created_at');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'capitulo'=>array('required','max:50','min:1'),
				'titulo'=>array('required','max:120','min:5'),
				'numeroclases'=>array('required','max:999','min:1','integer'),
				'orden'=>array('required','max:99999999999','min:1','integer'),
				'objetivos'=>array('required','max:100000'),
				'descripcion'=>array('required','max:100000')
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
			$silabo = new SilabusCT;
			$silabo->codCargaAcademica_ct = Input::get('codCargaAcademica_ct');
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
				'capitulo'=>array('required','max:50','min:1'),
				'titulo'=>array('required','max:120','min:5'),
				'numeroclases'=>array('required','max:999','min:1','integer'),
				'orden'=>array('required','max:99999999999','min:1','integer'),
				'objetivos'=>array('required','max:100000'),
				'descripcion'=>array('required','max:100000')
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
