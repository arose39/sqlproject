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
        </tr>
        </thead>
        <tbody>
        @foreach ($groups as $group)
            <tr>
                <th scope="row">{{$group['id']}}</th>
                <td>{{$group['name']}}</td>
                <td>{{$group->students->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
