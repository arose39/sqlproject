<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\CreateStudentGroupActionContract;
use App\Contracts\UpdateStudentGroupActionContract;
use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Student;

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
     * @param StudentRequest $request
     * @param CreateStudentGroupActionContract $createStudentGroupAction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentRequest $request, CreateStudentGroupActionContract $createStudentGroupAction)
    {
        $newStudent = $createStudentGroupAction($request->all());
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
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $student = Student::find($id);

        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $groups = Group::orderBy('id')->get();
        $courses = Course::orderBy('name')->get();

        return view('students.edit', [
            'student' => $student,
            'groups' => $groups,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param UpdateStudentGroupActionContract $updateStudentGroupAction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, string $id, UpdateStudentGroupActionContract $updateStudentGroupAction)
    {
        $updatedStudent = $updateStudentGroupAction($id, $request->all());
        session()->flash(
            'message',
            "Student $updatedStudent->first_name $updatedStudent->last_name  was successfully edited"
        );

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        session()->flash('message', "Student $id was successfully deleted");

        return redirect()->route('students.index');
    }
}
