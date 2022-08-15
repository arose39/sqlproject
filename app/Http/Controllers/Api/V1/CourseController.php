<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Models\Course;

class CourseController extends Controller
{
    public function __invoke(): CourseCollection
    {
        $courses = Course::all();

        return new CourseCollection($courses);
    }
}
