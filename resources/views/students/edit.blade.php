@extends('layouts/layout')
@section('title') Edit student @endsection
@section('main_content')
    <h1>Edit student</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('students.update', $student)}}" method="post">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="first_name">first_name</label>
                <input name="first_name" type="string" class="form-control"
                       value="{{$student['first_name']}}" id="first_name"
                       placeholder="Enter first name">
            </div>
            <div class="last_name">
                <label for="last_name">last_name</label>
                <input name="last_name" type="string" class="form-control"
                       value="{{$student['last_name']}}" id="last_name"
                       placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="group">Group</label>
                <select name="group" class="custom-select mr-sm-2" name="group" id="group">
                    <option value="" @if($student->group['id']==='')selected @endif>
                        Not assigned
                    </option>
                    @foreach($groups as $group)
                        <option value="{{$group['id']}}"
                                @if($student->group['id']===$group['id']) selected @endif >
                            {{$group['name']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="first_course">first course(mandatory)</label>
                <select class="custom-select mr-sm-2" name="first_course" id="first_course">
                    <option value="">Choose...</option>
                    @foreach($courses as $course)
                        <option value="{{$course['id']}}"
                                @if($student->courses[0]['name']===$course['name'])
                                selected @endif >
                            {{$course['name']}}
                        </option>
                    @endforeach
                </select>
                <label class="mr-sm-2" for="second_course">second course(optional)</label>
                <select class="custom-select mr-sm-2" name="second_course" id="second_course">
                    <option value="" @if(!isset($student->courses[1]['name'])) selected @endif>Choose...</option>
                    @foreach($courses as $course)
                        <option value="{{$course['id']}}"
                                @if(isset($student->courses[1]['name']) && $student->courses[1]['name']===$course['name'])
                                selected @endif >
                            {{$course['name']}}
                        </option>
                    @endforeach
                </select>
                <label class="mr-sm-2" for="third_course">third course(optional)</label>
                <select class="custom-select mr-sm-2" name="third_course" id="third_course">
                    <option value="" @if(!isset($student->courses[2]['name'])) selected @endif>Choose...</option>
                    @foreach($courses as $course)
                        <option value="{{$course['id']}}"
                                @if(isset($student->courses[2]['name']) && $student->courses[2]['name']===$course['name'])
                                selected @endif>
                            {{$course['name']}}
                        </option>
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
