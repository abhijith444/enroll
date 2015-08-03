<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Section;
use App\Course;
use Validator;
use Session;


class SectionController extends Controller {

	public function index($cid)
	{
		$course = Course::find($cid);
		$sections = Section::where('course_id','=',$cid)->get();
		
		return view('sections.index')->with('sections',$sections)->with('course',$course);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($cid)
	{
		$course = Course::find($cid);
		return view('sections.create')->with('course',$course);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'crn'=> 'required|numeric|unique:sections,crn',
			'instructor'=> 'required',
			'alias'=> 'required',
			'time'=> 'required',
			);
		$input = $request->all();
		$validator = Validator::make($input, $rules);

        // process the login
		if ($validator->fails()) {
			return redirect()->back()
			->withErrors($validator)
			->withInput($input);
		} else {
            // store
			$course = Section::create($input);


            // redirect
			Session::flash('message', 'Successfully created sections');
			return redirect('courses/'.$input['course_id']."/sections");
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cid,$sid)
	{
		echo $cid." ".$sid;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($cid,$sid)
	{
		
		$section = Section::find($sid);

		return view('sections.edit')->with('section',$section);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($cid,$sid,Request $request)
	{
		// echo $cid." ".$sid;
		// validate
        // read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'crn'=> 'required|numeric',
			'instructor'=> 'required',
			'alias'=> 'required',
			'time'=> 'required',
			);
		$input = $request->all();
		$validator = Validator::make($input, $rules);

        // process the login
		if ($validator->fails()) {
			return redirect()->back()
			->withErrors($validator)
			->withInput($input);
		} else {
            // store
			$section = Section::find($sid);
			$section->update($input);


            // redirect
			Session::flash('message', 'Successfully updated sections');
			return redirect('courses/'.$input['course_id']."/sections");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($cid,$sid)
	{
		echo $cid." ".$sid;
		$section = Section::find($sid);
		$section->delete();
		Session::flash('message', 'Successfully deleted section');
		return redirect()->back();
	}

}
