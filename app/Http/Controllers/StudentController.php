<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\CreateStudentGroupActionContract;
use App\Contracts\UpdateStudentGroupActionContract;
use App\DataTransferObjects\StudentData;
use App\Filters\StudentFilter;
use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index(StudentFilter $studentFilter): View
    {
        $students = Student::filter($studentFilter)->orderBy('first_name')->paginate(15);
        $groups = Group::orderBy('id')->get();
        $courses = Course::orderBy('name')->get();

        return view('students.index', ['groups' => $groups, 'students' => $students, 'courses' => $courses]);
    }

    public function create(): View
    {
        $groups = Group::orderBy('id')->get();
        $courses = Course::orderBy('name')->get();

        return view('students.create', ['groups' => $groups, 'courses' => $courses]);
    }

    public function store(StudentRequest $request, CreateStudentGroupActionContract $createStudentGroupAction): RedirectResponse
    {
        $studentData =  StudentData::fromRequest($request);
        $newStudent = $createStudentGroupAction($studentData);
        session()->flash(
            'message',
            "Student $newStudent->first_name $newStudent->last_name  was successfully added"
        );

        return redirect()->route('students.index');
    }

    public function show($id): View
    {
        $student = Student::find($id);

        return view('students.show', ['student' => $student]);
    }

    public function edit($id): View
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

    public function update(
        StudentRequest $request,
        string $id,
        UpdateStudentGroupActionContract $updateStudentGroupAction
    ): RedirectResponse
    {
        $studentData =  StudentData::fromRequest($request);
        $updatedStudent = $updateStudentGroupAction($id, $studentData);
        session()->flash(
            'message',
            "Student $updatedStudent->first_name $updatedStudent->last_name  was successfully edited"
        );

        return redirect()->route('students.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        Student::find($id)->delete();
        session()->flash('message', "Student $id was successfully deleted");

        return redirect()->route('students.index');
    }
}
