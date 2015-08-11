@extends('app-admin')

@section('content')
<div class="container well">

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Section 1</th>
            <th>Section 2</th>
            <th>Section 3</th>
            <th>Section 4</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user['user']->student_id }}</td>
            <td>{{ $user['user']->name }}</td>
            @foreach($user['sections'] as $s)
                <td>{{$s->crn}} - {{$s->alias}}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection

@stop