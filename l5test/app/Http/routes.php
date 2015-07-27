<?php
use App\Section;
use App\Vsection;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@showLogin');
Route::get('/ttt', 'TestController@index');

Route::get('my', 'EnrollmentController@getData');
Route::get('/ajdata', 'TestController@ajtest');

Route::get('home', ['middleware'=>'auth','uses'=>'HomeController@index']);


Route::get('test', function(){
	// sleep(3);

	$data = Section::All();//Section::All();
	$success = "success";

	$response = array('success'=>$success,'sections'=>$data);
	return $response;
});

Route::get('test2', function(){
	sleep(1);
});

Route::get('test3', function(){
	$user = Auth::user();
	$user->getAvailableSections();
});

Route::get('enroll', 'EnrollmentController@enroll');
Route::get('drop', 'EnrollmentController@drop');



Route::post('tlogin', 'TestController@doLogin');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);
