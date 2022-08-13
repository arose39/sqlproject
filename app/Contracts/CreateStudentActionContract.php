<?php declare(strict_types=1);

namespace App\Contracts;

use App\Models\Student;

interface CreateStudentActionContract
{
    public function __invoke(array $data): Student;
}
