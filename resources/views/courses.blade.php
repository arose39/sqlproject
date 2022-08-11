@extends('layouts/layout')
@section('title') Courses @endsection
@section('main_content')
    <h1>Courses list</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Descriptio</th>
            <th scope="col">Quantity of students</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <th scope="row">{{$course['id']}}</th>
                <td>{{$course['name']}}</td>
                <td>{{$course['description']}}</td>
                <td>{{$course->students->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
