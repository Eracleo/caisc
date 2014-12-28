<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cargo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$table-> increments('id');
			$table->string('nombre',50);
			$table->string('privilegios',50);
			$table->text('descripcion');			
			$table->dateTime('updated_at');
			$table->dateTime('created_at');

			$table ->timestamp();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('cargo');
	}

}
