<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model {

	protected $fillable = ['student_id','section_id'];

	public static function enroll($uid,$sid)
	{
		$enrollment=Enrollment::create([
            'student_id' => $uid,
            'section_id' => $sid,
            ]);
		$section = Section::find($sid);
		$section->filled = $section->filled+1;
		$section->save();

		return $enrollment;
	}

	public static function drop($uid,$sid)
	{
		$enrollment=Enrollment::where('student_id','=',$uid)->where('section_id','=',$sid)->delete();
		$section = Section::find($sid);
		$section->filled = $section->filled-1;
		$section->save();

		return $sid;
	}
	

}
