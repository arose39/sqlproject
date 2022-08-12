@extends('layouts/layout')
@section('title') Create student @endsection
@section('main_content')
    <h1>Create student</h1>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('students.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="first_name">first_name</label>
                <input name="first_name" type="string" class="form-control" id="first_name"
                       placeholder="Enter first name">
            </div>
            <div class="last_name">
                <label for="last_name">last_name</label>
                <input name="last_name" type="string" class="form-control" id="last_name" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="group">Group</label>
                <select name="group" class="custom-select mr-sm-2" name="group" id="group">
                    <option value="" selected>Not assigned</option>
                    @foreach($groups as $group)
                        <option value="{{$group['id']}}">{{$group['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">

                <label class="mr-sm-2" for="first_course">first course(mandatory)</label>
                <select class="custom-select mr-sm-2" name="first_course" id="first_course">
                    <option value="" selected>Choose...</option>
                    @foreach($courses as $course)
                        <option value="{{$course['id']}}">{{$course['name']}}</option>
                    @endforeach
                </select>
                <label class="mr-sm-2" for="second_course">second course(optional)</label>
                <select class="custom-select mr-sm-2" name="second_course" id="second_course">
                    <option value="" selected>Choose...</option>
                    @foreach($courses as $course)
                        <option value="{{$course['id']}}">{{$course['name']}}</option>
                    @endforeach
                </select>
                <label class="mr-sm-2" for="third_course">third course(optional)</label>
                <select class="custom-select mr-sm-2" name="third_course" id="third_course">
                    <option value="" selected>Choose...</option>
                    @foreach($courses as $course)
                        <option value="{{$course['id']}}">{{$course['name']}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
