<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\UpdateStudentCoursesActionContract;
use App\Models\Student;
use App\Models\StudentCourse;

class UpdateStudentCoursesAction implements UpdateStudentCoursesActionContract
{
    public function __invoke(Student $student, array $courses): bool
    {
        StudentCourse::where('student_id', $student->id)->delete();
        foreach ($courses as $course) {
            $studentCourse = new StudentCourse;
            $studentCourse->student_id = $student['id'];
            $studentCourse->course_id = $course;
            $studentCourse->save();
        }

        return true;
    }
}
