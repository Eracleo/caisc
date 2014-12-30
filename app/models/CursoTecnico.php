<?php

class CursoTecnico extends Eloquent {

	protected $table = 'curso_ct';

	protected $fillable = array('id','nombre','modulo','estado','horas_academicas','codCarrera','updated_at','created_at');
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'id'=>array('required','min:2','max:10','alpha_num'),
			'nombre'=>array('required','min:5','max:30'),
			'modulo'=>array('required','max:2'),
			'horas_academicas'=>array('required','max:200','min:1','integer')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} 
		else
		{	
			$curso = new CursoTecnico;
			$curso->id = Input::get('id');
			$curso->nombre = Input::get('nombre');
			$curso->modulo = Input::get('modulo');
			$curso->horas_academicas = Input::get('horas_academicas');
			$curso->estado = 1;
			$curso->codCarrera = Input::get('codCarrera');
			$curso->created_at= time();
			$curso->updated_at = time();
			
			$aux =CursoTecnico::find(input::get('id'));

			if(is_object($aux))
			{
				if($aux->estado == 1)
				{				
					$respuesta['mensaje'] = 'Ya existe ese curso';
					$respuesta['error'] = true;
					$respuesta['data'] = $curso;
				}
				else
				{	
					$aux->nombre = Input::get('nombre');
					$aux->modulo = Input::get('modulo');
					$aux->horas_academicas = Input::get('horas_academicas');
					$aux->estado = 1;
						//$curso->codCarrera = Input::get('codCarrera');
					$aux->updated_at = time();
					$aux->save();

					$respuesta['mensaje'] = 'Curso Creado';
					$respuesta['error'] = false;
					$respuesta['data'] = $aux;
						
				}
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
					$respuesta['mensaje'] = 'No se pudo agregar el curso';
					$respuesta['error'] = true;
					$respuesta['data'] = $curso;
						
				}	

			}
			
		}
		return $respuesta;
	}
	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
		'id'=>array('required','min:2','max:10','alpha_num'),
			'nombre'=>array('required','min:5','max:30'),
			'modulo'=>array('required','max:2'),
			'horas_academicas'=>array('required','max:300','min:1','integer')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} 
		else
		{
			$respuesta['mensaje'] = 'Curso Actualizado';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}
