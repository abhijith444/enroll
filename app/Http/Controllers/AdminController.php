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
		$user_array = array();
		// echo "<pre>";

		// dd($enrollments);
		foreach ($enrollments as $enrollment) {
			$user=User::find($enrollment['student_id']);
			$section_array=explode(",",$enrollment['section_ids']);
			foreach($section_array as $sid)
				$sections[] = Vsection::find($sid);

			$user_array[] = array('user'=>$user,'sections'=>$sections);
			$sections=array();
		}

        // return view('reports.allSections');
        // return view('reports.enrollments-regular')->with('users',$user_array);
        //dd($user_array);
		return $user_array;
        // foreach($user_array[1]['sections'] as $s)
        //        echo $s->crn."<br>";
        // dd($user_array);
           // return $enrollments;
	}

	public function showAllEnrollments()
	{

		$user_array = $this->getAllEnrollments();
		$viewtype = Request::input('vt');
		
		switch ($viewtype) {
			case 'crn':
			return view('reports.enrollments-crn')->with('users',$user_array);
			break;
			
			case 'alias':
			return view('reports.enrollments-alias')->with('users',$user_array);
			break;

			case 'both':
			return view('reports.enrollments-both')->with('users',$user_array);
			break;
			default:
			echo "Default";
			break;
		}
	}

	public function showSections(){
		$sections = Vsection::all();
		
		return view('reports.allSections')->with('sections',$sections);
	}

	public function showManageStudents(){
		return view('admin.students');
	}

	public function resetUser(){
		$uid = Request::input('student_id');
		$user = User::where('student_id','=',$uid)->get();

		
		if($user->count()!=0){
			$user->get(0)->reset();
			return redirect()->back()->withErrors('Reset Successfull');
		}
		else
			return redirect()->back()->withErrors('Invalid Student ID');

	}

	public function addUser(){

		$text = explode(';',Request::input('student'));
		$text = array_map('trim',$text);
		$text = array_filter($text);
		// dd($text);
		$messages = array();
		foreach($text as $row)
		{
			$student = explode(',',$row);
			$student = array_map('trim',$student);
			$user = array(
				'student_id'=>$student[0],
				'name'=>$student[1],
				);

			$messages[] = User::create($user);
			

		}
		// dd($messages);
		return redirect()->back()->withErrors($messages);
		
		// if($user->count()!=0)
		// 	return redirect()->back()->withErrors('Reset Successfull');
		// else
		// 	return redirect()->back()->withErrors('Invalid Student ID');

	}

	
	
}
