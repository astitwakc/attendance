@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">Users</h4>
                <a href="{{ route('users.create') }}">
                    <button class="btn btn-primary pull-right">
                        Create New User
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ App\Role::find($user->role_id)->name }}</td>
                            <td>

                                <a href="{{ route('users.edit',$user->id) }}">
                                    <i class="ion ion-edit"></i>
                                </a>

                                <a href="{{ route('users.delete.confirm',$user->id) }}">
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