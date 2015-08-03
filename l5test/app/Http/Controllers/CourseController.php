<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Course;
use App\Section;
use Validator;
use Session;

class CourseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();

		return view('courses.index')->with('courses',$courses);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('courses.create');
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
            'course_code'=> 'required|numeric|unique:courses,course_code',
            'course_name'=> 'required',
            'course_type' => 'required'
        );
        $input = $request->all();
        $validator = Validator::make($input, $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('courses/create')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $course = Course::create($input);
            

            // redirect
            Session::flash('message', 'Successfully created course');
            return redirect('courses');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);

		return view('courses.edit')->with('course',$course);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'course_code'=> 'required|numeric',
            'course_name'=> 'required',
            'course_type' => 'required'
        );
        $input = $request->all();
        $validator = Validator::make($input, $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('courses/update')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $course = Course::find($id);
            $course->update($input);
            

            // redirect
            Session::flash('message', 'Successfully updated course');
            return redirect('courses');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$course = Course::find($id);
		$sections = Section::where('course_id','=',$id);

		$sections->delete();
		$course->delete();

		Session::flash("message","Course and sections deleted successfully");
		return redirect()->back();;
	}

}
