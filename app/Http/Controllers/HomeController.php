<?php namespace App\Http\Controllers;
use Auth;
use Mail;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	public function index()
	{
		return view('home');
	}

	public function sendConfirmation()
	{
		$user = Auth::user();
		$user->sendEnrollmentConfirmation();
		Auth::logout();
		return redirect('/')->withErrors("Email confirmation sent.");
	}

}
