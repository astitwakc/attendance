@extends('backend.layouts.master')



@section('content')

    {!! Form::model($role,[
    'route'=>$role->exists ? ['roles.update',$role->id]:'roles.store',
    'method'=>$role->exists ?'put':'post'
    ])!!}

    <div class="form-group">
        {!! Form::label('name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit($role->exists?'Update Role':'Add New Role',['class'=>'btn btn-success pull-right']) !!}
    </div>

    {!! Form::close() !!}

@endsection