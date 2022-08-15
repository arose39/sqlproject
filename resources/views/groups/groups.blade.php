@extends('layouts/layout')
@section('title') Groups @endsection
@section('main_content')
    <h1>Groups list</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity of students</th>
            <th scope="col">Show students</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($groups as $group)
            <tr>
                <th scope="row">{{$group['id']}}</th>
                <td>{{$group['name']}}</td>
                <td>{{$group->students->count()}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('students.index', ['group_id' => $group['id']])}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Show group`s students
                    </a>
                </td>
            </tr>
        @endforeach
        <tr>
            <th scope="row">n/a</th>
            <td>Not assigned to any of groups</td>
            <td>{{$numberStudentsWithoutGroup}}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('students.index', ['group_id' => 'n/a'])}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Show not assigned to group students
                </a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
