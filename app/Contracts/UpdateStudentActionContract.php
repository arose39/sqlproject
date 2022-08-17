<?php declare(strict_types=1);

namespace App\Contracts;

use App\DataTransferObjects\StudentData;
use App\Models\Student;

interface UpdateStudentActionContract
{
    public function __invoke(string $studentId, StudentData $data): ?Student;
}
