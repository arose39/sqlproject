<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();

        return view('courses.courses', ['courses' => $courses]);
    }
}
