<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\AddStudentCoursesActionContract;
use App\Contracts\CreateStudentActionContract;
use App\Contracts\CreateStudentGroupActionContract;
use App\DataTransferObjects\StudentData;
use App\Models\Student;

class CreateStudentGroupAction implements CreateStudentGroupActionContract
{
    public function __construct(
        private CreateStudentActionContract $createStudentAction,
        private AddStudentCoursesActionContract $addCoursesToStudentAction
    )
    {
    }

    public function __invoke(StudentData $data): Student
    {
        $student = ($this->createStudentAction)($data);
        ($this->addCoursesToStudentAction)($student, $data->courses);

        return $student;
    }
}
