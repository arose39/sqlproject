<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\CreateStudentActionContract;
use App\DataTransferObjects\StudentData;
use App\Models\Student;

class CreateStudentAction implements CreateStudentActionContract
{
    public function __invoke(StudentData $data): Student
    {
        $newStudent = new Student;
        $newStudent->first_name = $data->firstName;
        $newStudent->last_name = $data->lastName;
        $newStudent->group_id = $data->groupId;
        $newStudent->save();

        return $newStudent;
    }
}
