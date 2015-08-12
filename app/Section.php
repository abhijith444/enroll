<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Section extends Model {

	protected $fillable = ['crn','course_id','instructor','days','time','time_code','alias','capacity','location','description'];
	
}
