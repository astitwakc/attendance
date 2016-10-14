@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">Blogs</h4>
                <a href="{{ route('semesters.create') }}">
                    <button class="btn btn-primary pull-right">
                        Create New Semester
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($semesters as $semester)
                        <tr>
                            <td>{{ $semester->name }}</td>
                            <td>


                                <a href="{{ route('semesters.edit',$semester->id) }}">
                                    <i class="ion ion-edit"></i>
                                </a>
                                <a href="{{ route('semesters.delete.confirm',$semester->id) }}">
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