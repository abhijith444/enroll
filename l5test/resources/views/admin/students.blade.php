@extends('app-admin')

@section('content')
<div class="container">
    @if($errors->has())
    <div class="alert alert-info">{!! Html::ul($errors->all()) !!}</div>
    @endif
    <legend>Reset User</legend>
    
    {!! Form::open(array('url' =>'/reset_user')) !!}

    <div class="row">
        <div class="col-xs-8">
            {!! Form::text('student_id', Input::old('student_id'), array('class' => 'form-control','placeholder' => '700123456')) !!}
        </div>
        <div class="col-xs-2">
            {!! Form::submit('Reset Student', array('class' => 'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <br><br>
    <legend>Add Student</legend>
    
    {!! Form::open(array('url' =>'/add_user')) !!}

    <div class="row">
        <div class="col-xs-8">
            {!! Form::text('student', Input::old('student'), array('class' => 'form-control','placeholder' => '700123456, John Doe')) !!}
        </div>
        <div class="col-xs-2">
            {!! Form::submit('Add Student', array('class' => 'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}





</div>
@endsection

@stop