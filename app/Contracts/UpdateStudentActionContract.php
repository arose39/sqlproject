<?php declare(strict_types=1);

namespace App\Contracts;

use App\Models\Student;

interface UpdateStudentActionContract
{
    public function __invoke(string $studentId, array $data): Student;
}
