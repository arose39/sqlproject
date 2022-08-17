<?php declare(strict_types=1);

namespace App\Contracts;

use App\DataTransferObjects\StudentData;
use App\Models\Student;

interface CreateStudentGroupActionContract
{
    public function __invoke(StudentData $data): Student;
}
