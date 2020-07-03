<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResumesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resumes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('resumes_user_id_foreign');
			$table->string('firstname', 255);
			$table->string('lastname', 255);
			$table->string('email', 255);
			$table->integer('phone');
			$table->string('address');
			$table->date('birth_day');
			$table->string('pdf_name', 255)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resumes');
	}

}
