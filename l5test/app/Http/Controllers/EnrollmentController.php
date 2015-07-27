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
		$k = Enrollment::create([
            'student_id' => $user->id,
            'section_id' => $section_id,
            ]);
		return $k;
		
	}
	public function drop()
	{
		$section_id = Request::input('id');
		$user = Auth::user();
		$e = Enrollment::where('student_id', '=', $user->id)
						->where('section_id', '=', $section_id)
						->delete();
		
		
	}

	public function getData()
	{
		$user = Auth::user();//User::find(1);
		
		$enrollments = Enrollment::where('student_id', '=', $user->id)->get();

		$available_sections =$user->getAvailableSections(); //Vsection::All();

		$enrolled_sections = Array();
		foreach ($enrollments as $e) {
			$enrolled_sections[] = Vsection::find($e->section_id);
		}
		$data = Array(
			"success"=>"success",
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
