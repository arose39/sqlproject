<?php declare(strict_types=1);

namespace App\Contracts;

use App\Models\Student;

interface UpdateStudentGroupActionContract
{
    public function __invoke(string $studentId, array $data): ?Student;
}
