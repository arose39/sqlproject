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

    <form action="{{route('students.index')}}" method="get">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Search student by first name</label>
            <input name="search_first_name"
                   @if(isset($_GET['search_first_name'])) value="{{$_GET['search_first_name']}}"
                   @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type first name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Search student by last name</label>
            <input name="search_last_name" @if(isset($_GET['search_last_name'])) value="{{$_GET['search_last_name']}}"
                   @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type last name">
        </div>
        <div class="mb-3">
            <div class="form-label">Choose group</div>
            <select name="group_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option></option>
                <option value="n/a"
                        @if(isset($_GET['group_id'])) @if($_GET['group_id'] == 'n/a') selected @endif @endif>
                    Not assigned
                </option>
                @foreach($groups as $group)
                    <option value="{{$group->id}}" @if(isset($_GET['group_id']))
                    @if($_GET['group_id'] == $group->id) selected @endif @endif>
                        {{$group->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <div class="form-label">Choose course</div>
            <select name="course_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option></option>
                @foreach($courses as $course)
                    <option value="{{$course->id}}" @if(isset($_GET['course_id']))
                    @if($_GET['course_id'] == $course->id) selected @endif @endif>
                        {{$course->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Group</th>
            <th scope="col">Courses</th>
            <th scope="col">Actions</th>
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
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{route('students.edit', $student->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{route('students.show', $student->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Info
                    </a>
                    <form action="{{route('students.destroy', $student->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$students->links()}}
@endsection
