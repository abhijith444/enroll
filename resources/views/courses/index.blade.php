@extends('app-admin')

@section('content')
<div class="well container">
    <h2>All the courses
    <a class="btn btn-info pull-right" href="{!! URL::to('courses/create') !!}" >Add Course</a>
    </h2>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Course Code</td>
            <td>Course Name</td>
            <td>Type</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($courses as $value)
        <tr>
            <td>{!! $value->course_code !!}</td>
            <td>{!! $value->course_name !!}</td>
            <td>{!! $value->course_type !!}</td>
            <td>{!! $value->description !!}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the course (uses the destroy method DESTROY /courses/{id} -->
                {!! Form::open(array('url' => 'courses/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Course', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

                <a class="btn btn-md btn-success" href="{!! URL::to('courses/'.$value->id.'/sections') !!}">View/Add Sections</a>

                <!-- edit this course (uses the edit method found at GET /courses/{id}/edit -->
                <a class="btn btn-md btn-info" href="{!! URL::to('courses/' . $value->id . '/edit') !!}">Edit this Course</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection

@stop