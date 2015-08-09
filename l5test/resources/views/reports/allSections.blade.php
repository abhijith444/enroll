@extends('app-admin')

@section('content')
<div class="container well">

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>CRN</th>
            <th>Instructor</th>
            <th>Alias</th>
            <th>Capacity</th>
            <th>Remaining</th>
            
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


            
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection

@stop