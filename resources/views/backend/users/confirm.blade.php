@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                Are you sure to delete?
                <div class="alert alet-danger">
                    {!! Form::open(['method'=>'delete','route'=>['users.destroy',$id]]) !!}
                    <button type="submit" class="btn btn-danger">Delete this User</button>
                    {!!Form::close()!!}
                    <a href="{{route('users.index')}}">
                        <button class="btn btn-primary">
                            Go back please!!
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection