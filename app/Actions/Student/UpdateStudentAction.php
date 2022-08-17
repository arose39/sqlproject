<?php declare(strict_types=1);

namespace App\Actions\Student;

use App\Contracts\UpdateStudentActionContract;
use App\DataTransferObjects\StudentData;
use App\Models\Student;

class UpdateStudentAction implements UpdateStudentActionContract
{
    public function __invoke(string $studentId, StudentData $data): ?Student
    {
        $updatedStudent = Student::find($studentId);
        if (!$updatedStudent) {
            return null;
        }
        $updatedStudent->first_name = $data->firstName;
        $updatedStudent->last_name = $data->lastName;
        $updatedStudent->group_id = $data->groupId;
        $updatedStudent->save();

        return $updatedStudent;
    }
}
