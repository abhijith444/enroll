<?php namespace App\Http\Controllers;
use App\Section;
use App\Enrollment;
use App\User;
use App\Vsection;
use Auth;
use Request;
use DB;

class AdminController extends Controller {

	public function menroll($student_ids,$sid)
	{
		$section_id = Request::input('id');
		$user = Auth::user();
		$k = Enrollment::create([
            'student_id' => $user->id,
            'section_id' => $section_id,
            ]);
		return $k;
		
	}

	public function getAllEnrollments()
	{
		$enrollments = Enrollment::select('student_id', DB::raw('GROUP_CONCAT(section_id) AS section_ids'))
           ->groupBy('student_id')->get()->toArray();
        
		// echo "<pre>";

		dd($enrollments);
        // foreach ($enrollments as $enrollment) {
        // 	$user=User::find($enrollment['student_id']);
        // 	$section_array=explode(",",$enrollment['section_ids'])
        // 	for($section_array as $sid)
        // 		$sections[] = Vsection::find($sid);

        // }
	}
	
}
