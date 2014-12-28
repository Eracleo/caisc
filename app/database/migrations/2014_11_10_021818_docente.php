<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Docente extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Creamos la tabla docente con los campos más básicos.
		Schema::create('docente',function($table){
			$table-> increments('id');
			$table->string('nombre',50);
			$table->string('apellidos',50);
			$table->string('dni',8);
			$table->string('direccion',120);
			$table->string('urlImagen',120);
			$table->string('telefono',120);
			$table->string('email',120);
			$table->string('password',120);
			$table->integer('estado');
			$table->dateTime('updated_at');
			$table->dateTime('created_at');

			$table ->timestamp();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Eliminar la tabla docente
		Schema::drop('docente');
	}

}
