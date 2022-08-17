<?php declare(strict_types=1);

namespace App\Contracts;

use App\Models\Student;

interface AddStudentCoursesActionContract
{
    public function __invoke(Student $student, array $courses): void;
}
