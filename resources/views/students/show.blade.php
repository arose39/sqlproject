@extends('layouts/layout')
@section('title') Student {{$student->id}} info @endsection
@section('main_content')
    <h1>Student {{$student->id}} info</h1>
    <h2>Student first name: {{$student->first_name}}</h2>
    <h2>Student last name: {{$student->last_name}}</h2>
    <h2>Student group: {{$student->group->name??"Not assigned"}}</h2>
    <h2>Student added: {{$student->created_at??"Not assigned"}}</h2>
    <h2>Student last updates: {{$student->updated_at??"Not assigned"}}</h2>
    <h2>Student courses:</h2>
    <ul>
        @foreach($student->courses as $course)
            <li>
                <i>{{$course->name}} :</i>
                {{$course->description}}
            </li>
        @endforeach
    </ul>
    <div class="container">
        <td class="project-actions text-right">
            <a class="btn btn-info btn-sm" href="{{route('students.edit', $student->id)}}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
            </a>
            <form action="{{route('students.destroy', $student->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                    </i>
                    Delete
                </button>
            </form>
    </div>
@endsection
