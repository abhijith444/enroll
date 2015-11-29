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

		User::find($uid)->touch();

		
	}

	public static function mass_enroll($student_ids,$sid)
	{
		$messages=array();
		foreach($student_ids as $student_id)
		{
			$user = User::findUserByStudentId($student_id);
			if($user!=null){
				Enrollment::enroll($user->id,$sid);
				$messages[]=$student_id." enrolled successfully";
			}
			else
				$messages[]=$student_id." does not exist";
		}

		return $messages;

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

		return true;
	}

	public static function mass_drop($student_ids,$sid)
	{
		$messages=array();
		foreach($student_ids as $student_id)
		{
			$user = User::findUserByStudentId($student_id);
			if($user!=null){
				Enrollment::drop($user->id,$sid);
				$messages[]=$student_id." dropped successfully";
			}
			else
				$messages[]=$student_id." does not exist";
		}

		return $messages;
	}


	// public static function dropAll($uid)
	// {
	// 	$enrollments=Enrollment::where('student_id','=',$uid)->get();
		
	// 	foreach($enrollments as $enrollment){
	// 		drop($uid,$enrollment->section_id);
	// 	}

		
	// }
	


}
