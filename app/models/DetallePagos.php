<?php

class DetallePagos extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'detalle_pagos';
	protected $fillable = array('id','descripcion','id_modalidad','importe');
	public $timestamps = false;

}

