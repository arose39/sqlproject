<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\UpdateStudentActionContract;
use App\Models\Student;

class UpdateStudentAction implements UpdateStudentActionContract
{
    public function __invoke(string $studentId, array $data): Student
    {
        $updatedStudent = Student::find($studentId);
        $updatedStudent->first_name = $data['first_name'];
        $updatedStudent->last_name = $data['last_name'];
        $updatedStudent->group_id = $data['group'];
        $updatedStudent->save();

        return $updatedStudent;
    }
}
