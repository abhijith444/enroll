<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Request;
use Validator;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function showLogin()
	{
		if(Auth::check())
			return redirect('home');
		else
			return view('auth.login');
	}

	
	public function showEditUser()
	{
		if(!Auth::check())
			return view('auth.login');
		
		$user = Auth::user();
		return view('auth.edit')->with('user',$user);

			
	}
	public function updateUser()
	{
		//Take the data from auth-edit and push the update
		$data=Request::all();
		$data['password']=bcrypt($data['password']);

		$user = Auth::user();

		$user->update($data);

		return redirect()->back()->withErrors("Update Successfull");

			
	}

}
