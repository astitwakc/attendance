@extends('backend.layouts.master')



@section('content')

    {!! Form::model($semester,[
    'route'=>$semester->exists ? ['semesters.update',$semester->id]:'semesters.store',
    'method'=>$semester->exists ?'put':'post'
    ])!!}

    <div class="form-group">
        {!! Form::label('name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit($semester->exists?'Update Semester':'Add New Semester',['class'=>'btn btn-success pull-right']) !!}
    </div>

    {!! Form::close() !!}

@endsection