<?php namespace App\Http\Controllers;
use App\Section;
use App\Enrollment;
use App\User;
use App\Vsection;
use Auth;
use Request;
class EnrollmentController extends Controller {

	public function enroll()
	{
		$section_id = Request::input('id');
		$user = Auth::user();
		$enrollment_count = Enrollment::where('student_id', '=', $user->id)->count();
		if($enrollment_count>=3)
			return json_encode(array(
				"status"=>"error",
				"message"=>"You have already enrolled in maximum courses. Please contact the advisor"
				));

		
		$k = Enrollment::enroll($user->id,$section_id);
		file_put_contents("enroll_drop.log",date("F j, Y, g:i a")." ".$user->student_id."(".$user->name.") enrolled in Section Id: ".$section_id."\n",FILE_APPEND);
		return json_encode(array(
			"status"=>"success",
			"message"=>"Enrollment Successfull"
			));
		
	}
	public function drop()
	{

		$section_id = Request::input('id');
		$section = Vsection::find($section_id);

		// dd($section);
		
		if($section->course_type=="Pre-Requisite")
			return json_encode(array(
				"status"=>"error",
				"message"=>"Pre-Requisite cannot be dropped. Please contact the advisor"
				));


		$user = Auth::user();
		Enrollment::drop($user->id,$section_id);
		file_put_contents("enroll_drop.log",date("F j, Y, g:i a")." ".$user->student_id."(".$user->name.") dropped from Section Id: ".$section_id."\n",FILE_APPEND);
		return json_encode(array(
			"status"=>"success",
			"message"=>"Drop Successfull"
			));

		
	}

	public function getData()
	{
		$user = Auth::user();//User::find(1);
		
		$enrollments = Enrollment::where('student_id', '=', $user->id)->get();

		$available_sections =$user->getAvailableSections(); //Vsection::All();

		$enrolled_sections = array();
		foreach ($enrollments as $e) {
			$enrolled_sections[] = Vsection::find($e->section_id);
		}
		$data = Array(
			"status"=>"success",
			"enrolled_sections"=>$enrolled_sections,
			"available_sections"=>$available_sections
			);

		//echo $user->name;		
		// echo "<pre>";
		// print_r($data);

		// print_r(json_encode($data));

		//$data = json_encode($data);



		return json_encode($data);


	}
	

}
