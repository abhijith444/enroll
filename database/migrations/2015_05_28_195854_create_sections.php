<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSections extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('crn')->unique();
			$table->integer('course_id')->references('id')->on('courses');
			$table->string('instructor');
			$table->string('days'); //core, track, substitute, prereq
			$table->string('time');
			$table->integer('time_code');
			$table->string('alias');//->unique();
			$table->string('location');
			$table->integer('capacity');
			$table->integer('filled')->default(0);
			// $table->integer('wait_list')->default(0);
			
			$table->text('description');
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
		Schema::drop('sections');
	}

}
