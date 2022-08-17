<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\UpdateStudentActionContract;
use App\Contracts\UpdateStudentCoursesActionContract;
use App\Contracts\UpdateStudentGroupActionContract;
use App\DataTransferObjects\StudentData;
use App\Models\Student;

class UpdateStudentGroupAction implements UpdateStudentGroupActionContract
{
    public function __construct(
        private UpdateStudentActionContract $updateStudentAction,
        private UpdateStudentCoursesActionContract $updateStudentCoursesAction
    )
    {
    }

    public function __invoke(string $studentId, StudentData $data): ?Student
    {
        $student = ($this->updateStudentAction)($studentId, $data);
        if (!$student) {
            return null;
        }
        ($this->updateStudentCoursesAction)($student, $data->courses);

            return $student;
    }
}
