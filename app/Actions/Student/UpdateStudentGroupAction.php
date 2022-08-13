<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Models\Student;

class UpdateStudentGroupAction
{
    public function __construct(
        private UpdateStudentAction $updateStudentAction,
        private UpdateStudentCoursesAction $updateStudentCoursesAction
    )
    {
    }

    public function __invoke(string $studentId, array $data): Student
    {
        $student = ($this->updateStudentAction)($studentId, $data);
        $addingCoursesStatus = ($this->updateStudentCoursesAction)($student, $data['courses']);

        if ($addingCoursesStatus) {
            return $student;
        }
    }
}
