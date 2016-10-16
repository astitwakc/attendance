@extends('backend.layouts.master')



@section('content')
    {!! Form::model($user,[
    'route'=>$user->exists ? ['users.update',$user->id]:'users.store',
    'method'=>$user->exists ?'put':'post'
    ])!!}

    <div class="form-group">
        {!! Form::label('name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('Choose Role')!!}
        {!! Form::select('role_id',$role_list,$user->role_id,['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('email')!!}
        {!! Form::email('email',null,['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('password')!!}
        {!! Form::password('password',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation')!!}
        {!! Form::password('password_confirmation',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit($user->exists?'Update User':'Add New User',['class'=>'btn btn-success pull-right']) !!}
    </div>

    {!! Form::close() !!}

@endsection