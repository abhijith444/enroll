@extends('app-admin')

@section('content')
<div class="container well">

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Count</th>
        @foreach($courses as $course)
            <th>CIS{{$course['course_code']}}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user['student_id'] }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['count'] }}</td>
        @foreach($courses as $course)
            <td>{{$user['courses'][$course['course_code']]['crn']}}</td>
        @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection

@stop