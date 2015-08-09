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

	public static function mass_enroll($student_ids,$sid)
	{
		foreach($uid as $student_ids)
			enroll($uid,$sid);
	}

	public static function mass_drop($student_ids,$sid)
	{
		foreach($student_ids as $uid)
			drop($uid,$sid);
	}

	

	public static function drop($uid,$sid)
	{
		$enrollment=Enrollment::where('student_id','=',$uid)->where('section_id','=',$sid);
		if($enrollment->count()<=0)
			return "Enrollment does not exist.";
		$enrollment->delete();
		$section = Section::find($sid);
		$section->filled = $section->filled-1;
		$section->save();

		return $sid;
	}

	public static function dropAll($uid)
	{
		$enrollments=Enrollment::where('student_id','=',$uid)->get();
		
		foreach($enrollments as $enrollment){
			drop($uid,$enrollment->section_id);
		}

		
	}
	


}
