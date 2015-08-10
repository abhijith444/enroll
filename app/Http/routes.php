<?php
use App\Section;
use App\Vsection;
use App\User;

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

Route::post('update-user','Auth\AuthController@updateUser');
Route::get('edit-user','Auth\AuthController@showEditUser');


Route::get('/ttt', 'TestController@index');


Route::get('my', 'EnrollmentController@getData');
Route::get('/ajdata', 'TestController@ajtest');

Route::get('home', ['middleware'=>'auth','uses'=>'HomeController@index']);


Route::get('test', function(){
	
	dd(User::findUserByStudentId('700626229'));

	// Mail::raw('Text to e-mail', function ($message) {
	// 	$message->to("abhijth8@gmail.com", "Abhijth Garu")
	// 	->subject('This is a test mail');

	// });

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



Route::get('allroll', 'AdminController@showAllEnrollments');
Route::post('reset_user','AdminController@resetUser');
Route::post('add_user','AdminController@addUser');
Route::get('students','AdminController@showManageStudents');
Route::get('sections','AdminController@showSections');
Route::resource("courses","CourseController");
Route::resource('courses.sections', 'SectionController');

Route::post('menroll', 'EnrollmentController@mass_enroll');
Route::post('mdrop', 'EnrollmentController@mass_drop');