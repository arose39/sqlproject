<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Actions\Student\AddCoursesToStudentAction;
use App\Actions\Student\CreateStudentAction;
use App\Models\Student;

class CreateStudentGroupAction
{
    public function __construct(
        private CreateStudentAction $createStudentAction,
        private AddCoursesToStudentAction $addCoursesToStudentAction
    )
    {
    }

    public function __invoke(array $data): Student
    {
        $student = ($this->createStudentAction)($data);
        $addingCoursesStatus = ($this->addCoursesToStudentAction)($student, $data['courses']);

        if($addingCoursesStatus){
            return $student;
        }

    }
}
