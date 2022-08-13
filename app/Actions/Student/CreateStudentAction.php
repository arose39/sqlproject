<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\CreateStudentActionContract;
use App\Models\Student;

class CreateStudentAction implements CreateStudentActionContract
{
    public function __invoke(array $data): Student
    {
        $newStudent = new Student;
        $newStudent->first_name = $data['first_name'];
        $newStudent->last_name = $data['last_name'];
        $newStudent->group_id = $data['group'];
        $newStudent->save();

        return $newStudent;
    }
}
