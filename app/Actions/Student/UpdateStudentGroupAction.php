<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\UpdateStudentActionContract;
use App\Contracts\UpdateStudentCoursesActionContract;
use App\Contracts\UpdateStudentGroupActionContract;
use App\Models\Student;

class UpdateStudentGroupAction implements UpdateStudentGroupActionContract
{
    public function __construct(
        private UpdateStudentActionContract $updateStudentAction,
        private UpdateStudentCoursesActionContract $updateStudentCoursesAction
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
