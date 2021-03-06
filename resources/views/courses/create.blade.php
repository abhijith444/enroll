@extends('app-admin')

@section('content')
<div class="well container">
    <h1>Create a Course</h1>

    <!-- if there are creation errors, they will show here -->
    {!! Html::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'courses')) !!}

    <div class="form-group">
        {!! Form::label('course_code', 'Course Code') !!}
        {!! Form::text('course_code', Input::old('course_code'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('course_name', 'Course Name') !!}
        {!! Form::text('course_name', Input::old('course_name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('course_type', 'Course Type') !!}
        {!! Form::select('course_type', 
            array('Core' => 'Core', 'Track' => 'Track', 'Pre-Requisite' => 'Pre-Requisite'),
            Input::old('course_type'), 
            array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
    </div>



        {!! Form::submit('Create Course', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}

    </div>
    @endsection

    @stop