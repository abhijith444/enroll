<?php namespace App\Http\Controllers;

use Input;
use Auth;
use Redirect;

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

	if(Auth::attempt(['student_id' => $data['student_id'], 'password' => $data['password']]))
		return Redirect::to('home');
	else
		echo "Failure";
	// Auth::loginUsingId(1);
	
	
	
}

}
