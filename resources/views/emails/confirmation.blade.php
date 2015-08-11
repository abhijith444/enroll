Your current enrollment 
<table border=1px>
    <thead>
        <tr>
            <th>Course Code</th>
            <th>CRN</th>
            <th>Course Name</th>
            <th>Instructor</th>
            <th>Time</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $value)
        <tr>
            <td>{!! $value->course_code!!}</td>
            <td>{!! $value->crn!!}</td>
            <td>{!! $value->course_name!!}</td>
            <td>{!! $value->instructor!!}</td>
            <td>{!! $value->days!!} {!! $value->time !!}</td>
            <td>{!! $value->location!!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
