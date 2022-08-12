<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::orderBy('first_name')->get();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $groups = Group::orderBy('id')->get();
        $courses = Course::orderBy('name')->get();
        return view('students.create', ['groups' => $groups, 'courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'first_course' => 'required',
            'second_course' => "nullable|different:first_course",
            'third_course' => "nullable|different:second_course|different:second_course",
        ]);

        $newStudent = new Student;
        $newStudent->first_name = $request->input('first_name');
        $newStudent->last_name = $request->input('last_name');
        $newStudent->group_id = $request->input('group');
        $newStudent->save();


        $firstStudentCourse = new StudentCourse;
        $firstStudentCourse->student_id = $newStudent['id'];
        $firstStudentCourse->course_id = $request->input('first_course');
        $firstStudentCourse->save();

        if ($request->input('second_course')) {
            $secondStudentCourse = new StudentCourse;
            $secondStudentCourse->student_id = $newStudent['id'];
            $secondStudentCourse->course_id = $request->input('second_course');
            $secondStudentCourse->save();
        }
        if ($request->input('third_course')) {
            $thirdStudentCourse = new StudentCourse;
            $thirdStudentCourse->student_id = $newStudent['id'];
            $thirdStudentCourse->course_id = $request->input('third_course');
            $thirdStudentCourse->save();
        }
        session()->flash(
            'message',
            "Student $newStudent->first_name $newStudent->last_name  was successfully added"
        );

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'first_course' => 'required',
            'second_course' => "nullable|different:first_course",
            'third_course' => "nullable|different:second_course|different:second_course",
        ]);

        $newStudent = new Student;
        $newStudent->first_name = $request->input('first_name');
        $newStudent->last_name = $request->input('last_name');
        $newStudent->group_id = $request->input('group');
        $newStudent->save();


        $firstStudentCourse = new StudentCourse;
        $firstStudentCourse->student_id = $newStudent['id'];
        $firstStudentCourse->course_id = $request->input('first_course');
        $firstStudentCourse->save();

        if ($request->input('second_course')) {
            $secondStudentCourse = new StudentCourse;
            $secondStudentCourse->student_id = $newStudent['id'];
            $secondStudentCourse->course_id = $request->input('second_course');
            $secondStudentCourse->save();
        }
        if ($request->input('third_course')) {
            $thirdStudentCourse = new StudentCourse;
            $thirdStudentCourse->student_id = $newStudent['id'];
            $thirdStudentCourse->course_id = $request->input('third_course');
            $thirdStudentCourse->save();
        }
        session()->flash(
            'message',
            "Student $newStudent->first_name $newStudent->last_name  was successfully edited"
        );

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
