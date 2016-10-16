@extends('backend.layouts.master')



@section('content')

    {!! Form::model($student,[
    'route'=>$student->exists ? ['students.update',$student->id]:'students.store',
    'method'=>$student->exists ?'put':'post'
    ])!!}

    <div class="form-group">
        {!! Form::label('name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('Choose Semester')!!}
        {!! Form::select('semester_id',$semester_list,$student->semester_id,['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('email')!!}
        {!! Form::email('email',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('address')!!}
        {!! Form::text('address',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('phone')!!}
        {!! Form::text('phone',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('parent_name')!!}
        {!! Form::text('parent_name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit($student->exists?'Update Student':'Add New Student',['class'=>'btn btn-success pull-right']) !!}
    </div>

    {!! Form::close() !!}

@endsection