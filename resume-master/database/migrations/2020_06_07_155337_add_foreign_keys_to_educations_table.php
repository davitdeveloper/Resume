<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEducationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('educations', function(Blueprint $table)
		{
			$table->foreign('resume_id', 'educations_ibfk_1')->references('id')->on('resumes')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('educations', function(Blueprint $table)
		{
			$table->dropForeign('educations_ibfk_1');
		});
	}

}
