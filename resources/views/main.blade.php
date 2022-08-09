@extends('layouts/layout')
@section('title') Главная страница @endsection
@section('main_content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6  mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Students list</h1>
            <a class="btn btn-outline-secondary" href="{{route('students')}}">Посмотреть</a>
        </div>
        <div class="col-md-6  mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Courses</h1>
            <a class="btn btn-outline-secondary" href="{{route('courses')}}">Посмотреть</a>
        </div>
        <div class="col-md-6  mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Groups</h1>
            <a class="btn btn-outline-secondary" href="{{route('groups')}}">Посмотреть</a>
        </div>
    </div>
@endsection
