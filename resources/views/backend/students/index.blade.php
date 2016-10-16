@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">Students</h4>
                <a href="{{ route('students.create') }}">
                    <button class="btn btn-primary pull-right">
                        Create New Students
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
                        <th>Semester</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Parent Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ App\Semester::find($student->semester_id)->name }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->parent_name }}</td>
                            <td>

                                <a href="{{ route('students.edit',$student->id) }}">
                                    <i class="ion ion-edit"></i>
                                </a>

                                <a href="{{ route('students.delete.confirm',$student->id) }}">
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