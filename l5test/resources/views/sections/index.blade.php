@extends('app-admin')

@section('content')
<div class="container well">
    <h2>Course : {{$course->course_name}}
    <a class="btn btn-info pull-right" href="{!! URL::to('courses/'.$course->id.'/sections/create') !!}" >Add Sections</a>
    </h2>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>CRN</td>
            <td>Instructor</td>
            <td>Alias</td>
            <td>Capacity</td>
            <td>Remaining</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($sections as $value)
        <tr>
            <td>{!! $value->crn !!}</td>
            <td>{!! $value->instructor !!}</td>
            <td>{!! $value->alias !!}</td>
            <td>{!! $value->capacity !!}</td>
            <td>{!! $value->capacity - $value->filled !!}</td>


            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the course (uses the destroy method DESTROY /courses/{id} -->
                {!! Form::open(array('url' => 'courses/'.$value->course_id.'/sections/'.$value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Section', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

                <a class="btn btn-md btn-success" href="{!! URL::to('courses/'. $course->id.'/sections/' .$value->id) !!}">View Section</a>

                <!-- edit this course (uses the edit method found at GET /courses/{id}/edit -->
                <a class="btn btn-md btn-info" href="{!! URL::to('courses/'. $course->id.'/sections/' .$value->id.'/edit') !!}">Edit this Section</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection

@stop