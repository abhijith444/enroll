<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Section;
use App\Enrollment;
use App\Vsection;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['student_id','name', 'email', 'password','given_name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	function getEnrollments(){
		$enrollments = Enrollment::where('student_id', '=', $this->id)->get()->toArray();
		return $enrollments;
	}


	function getAvailableSections(){
		$enrollments = Enrollment::where('student_id', '=', $this->id)->get()->toArray();
		$enrollment_ids =array_column($enrollments,'id');
		$section_ids =array_column($enrollments,'section_id');
		$sections_enrolled=Section::whereIn('id',$section_ids)->get()->toArray();

		$courses_enrolled = array_column($sections_enrolled,'course_id');
		$sections_enrolled_timecode = array_column($sections_enrolled,'time_code');
		$sections_enrolled_days = array_column($sections_enrolled,'days');

		$sections_enrolled_timeflags=[];


		for($i=0;$i<count($sections_enrolled_timecode);$i++)
			$sections_enrolled_timeflags[] = $sections_enrolled_days[$i].$sections_enrolled_timecode[$i];

		$sections_available=Section::whereNotIn('course_id',$courses_enrolled)->get()->toArray();
		$sections_available_ids = array_column($sections_available,'id');

		$vsections_available=Vsection::whereIn('id',$sections_available_ids)
										->whereRaw('filled < capacity')
										->whereNotIn('time_flag',$sections_enrolled_timeflags)
										->get()->toArray();
		
		// print_r($section_ids);


		// foreach ($enrollments as $e) {
		// 	$enrollment_ids[] = $e->id;
		// }

		
		// dd($sections_enrolled);
		
		// dd($vsections_available);
		return $vsections_available;


	}

	public function reset(){
		Enrollment::dropAll($this->student_id);
		$this->email = "";
		$this->password = "";
		$this->email_ucm = "";
		$this->given_name = "";
		$this->facebook_url = "";
		

		$this->save();
	}

	public static function findUserByStudentId($sid){
		$user = User::where('student_id','=',$sid);
		if($user->count()==0)
			return null;
		else
			return $user->first();
	}

}
