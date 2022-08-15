<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $groups = Group::all();
        $numberStudentsWithoutGroup = Student::where('group_id', null)->count();

        return view('groups.groups', ['groups' => $groups, 'numberStudentsWithoutGroup' => $numberStudentsWithoutGroup]);
    }
}
