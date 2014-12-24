<?php

class CursoLibre extends Eloquent {

	protected $table = 'curso_cl';
	protected $fillable = array('id','codigo','nombre','horas_academicas','estado','updated_at','created_up');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'codigo'=>array('required','max:10'),
				'nombre'=>array('required','max:30'),
				'horas_academicas'=>array('required','max:30')
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'DATOS INGRESADOS INCORRECTAMENTE';
			$respuesta['error'] = true;
		} 
		else
		{
			$curso = new CursoLibre;
			$curso->codigo = Input::get('codigo');
			$curso->nombre = Input::get('nombre');
			$curso->horas_academicas = Input::get('horas_academicas');
			$curso->estado = 1;
			$curso->created_at= time();
			$curso->updated_at = time();
			if(!CursoLibre::find(input::get('codigo')))
			{
				$respuesta['mensaje'] = 'YA EXISTE ESE CODIGO';
				$respuesta['error'] = true;
				$respuesta['data'] = $curso;
			}
			else
			{
				if ($curso->save()) 
				{
					$respuesta['mensaje'] = 'Curso Creado';
					$respuesta['error'] = false;
					$respuesta['data'] = $curso;				
				}
				else 
				{
					$respuesta['mensaje'] = 'DATOS INCORRECTOS';
					$respuesta['error'] = true;
					$respuesta['data'] = $curso;				
				}	
			}		
		}
		return $respuesta;
	}
}
