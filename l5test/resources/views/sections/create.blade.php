@extends('app')

@section('content')
<div class="container">
    <h1>Create a Section : {{$course->course_name}}</h1>
    <?php
    $days_array = array(
        'M'=>'Monday',
        'T'=>'Tuesday',
        'W'=>'Wednesday',
        'R'=>'Thursday',
        'F'=>'Friday',
        'S'=>'Saturday'
        );
    $timecode_array = array(
        1=>'9:00am - 12:00pm',
        2=>'1:00pm - 04:00pm',
        3=>'6:00pm - 09:00pm'
        );

        ?>
        <!-- if there are creation errors, they will show here -->
        {!! Html::ul($errors->all()) !!}

        {!! Form::open(array('url' =>'courses/'.$course->id.'/sections')) !!}
        {!! Form::hidden('course_id',$course->id ) !!}
        <div class="form-group">
            {!! Form::label('crn', 'CRN') !!}
            {!! Form::text('crn', Input::old('crn'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('instructor', 'Instructor') !!}
            {!! Form::text('instructor', Input::old('instructor'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('alias', 'Alias') !!}
            {!! Form::text('alias', Input::old('alias'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('time', 'Time') !!}
            {!! Form::text('time', Input::old('time'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('time_code', 'Time Code') !!}
            {!! Form::select('time_code', 
                $timecode_array,
                Input::old('time_code'), 
                array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('days', 'Days') !!}
                {!! Form::select('course_type', 
                    $days_array,
                    Input::old('course_type'), 
                    array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('capacity', 'Capacity') !!}
                    {!! Form::text('capacity', Input::old('capacity'), array('class' => 'form-control','type'=>'number')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('location', 'Location') !!}
                    {!! Form::text('location', Input::old('location'), array('class' => 'form-control','type'=>'number')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
                </div>



                {!! Form::submit('Create Section', array('class' => 'btn btn-primary')) !!}

                {!! Form::close() !!}

            </div>
@endsection

@stop