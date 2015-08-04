@extends('app-admin')

@section('content')
<div class="container well">
    <h1>Showing Section: {{ $section->course_name }}({{ $section->crn }})</h1>
    {!! Html::ul($errors->all()) !!}
    <div class="text-center">
        <legend>Mass Enroll</legend>
        {!! Form::open(array('url' => 'menroll')) !!}
        <div class="form-group">
            {!! Form::label('student_ids', 'Enter the 700#s of students seperated commas') !!}
            {!! Form::text('student_ids', Input::old('student_ids'), array('class' => 'form-control')) !!}
            <button class="btn btn-info" type="submit">Mass Enroll</button>
        </div>
        {!! Form::close() !!}

        <legend>Mass Drop</legend>
        {!! Form::open(array('url' => 'mdrop')) !!}
        <div class="form-group">
            {!! Form::label('student_ids', 'Enter the 700#s of students seperated commas') !!}
            {!! Form::text('student_ids', Input::old('student_ids'), array('class' => 'form-control')) !!}
            <button class="btn btn-danger" type="submit">Mass Drop</button>
        </div>
        {!! Form::close() !!}
    </div>

</div>
@endsection

@stop