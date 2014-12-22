<?php

class CursoTecnico extends Eloquent {

	protected $table = 'curso_ct';

	protected $fillable = array('id','codigo','nombre','modulo','estado','horas_academicas','codCarrera','updated_at','created_at');
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'codigo'=>array('required','max:10'),
			'nombre'=>array('required','max:30'),
			'modulo'=>array('required','max:2'),
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
			$curso = new CursoTecnico;
			$curso->codigo = Input::get('codigo');
			$curso->nombre = Input::get('nombre');
			$curso->modulo = Input::get('modulo');
			$curso->horas_academicas = Input::get('horas_academicas');
			$curso->estado = 1;
			$curso->codCarrera = Input::get('codCarrera');
			$curso->created_at= time();
			$curso->updated_at = time();		
			if(CursoTecnico::find(input::get('codigo')))
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
