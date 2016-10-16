@extends('attendance.index')

@section('semesters')
<div class="col-lg-12">
    {!! Form::open() !!}
    <table class="table table-bordered">
        <thead>
        <th>Roll No</th>
        <th>Student Name</th>
        <th>Attendance</th>
        <th>Remarks</th>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}{!! Form::hidden('student_id',$student->id) !!}</td>
            <td>{{ $student->name }}</td>
            <td>{!! Form::checkbox('attendance') !!}</td>
            <td>{!! Form::text('remarks',null,['class'=>'form-control']) !!}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {!! Form::submit('Submit Attendance',['class'=>'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}
</div>

@endsection