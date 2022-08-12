@extends('layouts/layout')
@section('title') Students list @endsection
@section('main_content')
    <a class="btn btn-block btn-info btn-lg" href="{{route('students.create')}}">
        Create new student
    </a>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <h1>Students list</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Group</th>
            <th scope="col">Courses</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <th scope="row">{{$student['id']}}</th>
                <td>{{$student['first_name']}}</td>
                <td>{{$student['last_name']}}</td>
                <td>{{$student->group['name']??"Not assigned"}}</td>
                <td>
                    @foreach($student->courses as $course)
                    {{$course['name']}} <br>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection