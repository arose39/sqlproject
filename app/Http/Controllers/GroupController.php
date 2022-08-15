<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Contracts\View\View;

class GroupController extends Controller
{
    public function index(): View
    {
        $groups = Group::all();
        $numberStudentsWithoutGroup = Student::where('group_id', null)->count();

        return view('groups.groups', ['groups' => $groups, 'numberStudentsWithoutGroup' => $numberStudentsWithoutGroup]);
    }
}
