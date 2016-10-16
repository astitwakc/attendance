@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">Blogs</h4>
                <a href="{{ route('roles.create') }}">
                    <button class="btn btn-primary pull-right">
                        Create New Role
                    </button>
                </a>
            </div>
        </div>   <!--end of row-->
        <hr>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Role Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.edit',$role->id) }}">
                                    <i class="ion ion-edit"></i>
                                </a>
                                <a href="{{ route('roles.delete.confirm',$role->id) }}">
                                    <i class="ion ion-close-circled"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection