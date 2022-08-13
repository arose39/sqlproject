<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\AddStudentCoursesActionContract;
use App\Models\Student;
use App\Models\StudentCourse;

class AddStudentCoursesAction implements AddStudentCoursesActionContract
{
    public function __invoke(Student $student, array $courses): bool
    {
        foreach ($courses as $course) {
            $studentCourse = new StudentCourse;
            $studentCourse->student_id = $student['id'];
            $studentCourse->course_id = $course;
            $studentCourse->save();
        }

        return true;
    }
}
