<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVsectionsView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$query = "CREATE VIEW vsections AS
		SELECT s.id,s.crn,s.course_id,s.days,s.time,s.description,s.alias,s.instructor,s.location,concat(s.days,s.time_code) as time_flag,
		c.course_code,c.course_name
		FROM sections s 
		JOIN courses c
		ON s.course_id = c.id";

		DB::statement( $query );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement( 'DROP VIEW vsections' );
	}

}
