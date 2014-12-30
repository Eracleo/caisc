<?php
class Carrera extends Eloquent {
	protected $table = 'carrera';
	protected $fillable = array('id','nombre','descripcion','estado','updated_at','created_at');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:3','max:50'),
			'id'=>array('required','min:2'),
			'descripcion'=>array('required','min:3')
		);	
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{

			$carrera = new Carrera;
			$carrera->id = Input::get('id');
			$carrera->nombre = Input::get('nombre');
			$carrera->descripcion = Input::get('descripcion');
			$carrera->estado = 1;
			$carrera->created_at= time();
			$carrera->updated_at = time();
			$aux = Carrera::find(input::get('id'));
			if(is_object($aux))
			{
				if($aux->estado == 1)
				{				
					$respuesta['mensaje'] = 'Ya existe ese curso';
					$respuesta['error'] = true;
					$respuesta['data'] = $carrera;
				}
				else
				{	
					$aux->nombre = Input::get('nombre');
					$aux->descripcion = Input::get('descripcion');
					$aux->estado = 1;
					$aux->updated_at = time();
					$aux->save();
					$respuesta['mensaje'] = 'Carrera Creada';
					$respuesta['error'] = false;
					$respuesta['data'] = $aux;
						
				}
			}
			else
			{
				if ($carrera->save()) 
				{
					$respuesta['mensaje'] = 'Carrera Creada';
					$respuesta['error'] = false;
					$respuesta['data'] = $carrera;
					
				}
				else 
				{
					$respuesta['mensaje'] = 'No se pudo agregar la Carrera';
					$respuesta['error'] = true;
					$respuesta['data'] = $carrera;
						
				}	

			}
		}
		return $respuesta;
	}
	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:3','max:50'),
			'id'=>array('required','min:2'),
			'descripcion'=>array('required','min:3')
		);	
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'Datos incorrectos, ingresar datos correctamente';
			$respuesta['error'] = true;
		} else
		{
			$respuesta['mensaje'] = 'Carrera Actualizada';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}

