@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <p><a href="{{ URL::to('first_semester') }}">First Semester</a> </p>

            @yield('semesters')

        </div>
    </div>
@endsection