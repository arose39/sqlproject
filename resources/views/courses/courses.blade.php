@extends('layouts/layout')
@section('title') Courses @endsection
@section('main_content')
    <h1>Courses list</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity of students</th>
            <th scope="col">Show students</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <th scope="row">{{$course['id']}}</th>
                <td>{{$course['name']}}</td>
                <td>{{$course['description']}}</td>
                <td>{{$course->students->count()}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('students.index', ['course_id' => $course['id']])}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Show course`s students
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
