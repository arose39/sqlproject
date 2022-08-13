<?php

namespace App\Providers;

use App\Actions\Student\AddStudentCoursesAction;
use App\Actions\Student\CreateStudentAction;
use App\Actions\Student\CreateStudentGroupAction;
use App\Actions\Student\UpdateStudentAction;
use App\Actions\Student\UpdateStudentCoursesAction;
use App\Actions\Student\UpdateStudentGroupAction;
use App\Contracts\AddStudentCoursesActionContract;
use App\Contracts\CreateStudentActionContract;
use App\Contracts\CreateStudentGroupActionContract;
use App\Contracts\UpdateStudentActionContract;
use App\Contracts\UpdateStudentCoursesActionContract;
use App\Contracts\UpdateStudentGroupActionContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        AddStudentCoursesActionContract::class => AddStudentCoursesAction::class,
        CreateStudentActionContract::class => CreateStudentAction::class,
        CreateStudentGroupActionContract::class => CreateStudentGroupAction::class,
        UpdateStudentActionContract::class => UpdateStudentAction::class,
        UpdateStudentCoursesActionContract::class => UpdateStudentCoursesAction::class,
        UpdateStudentGroupActionContract::class => UpdateStudentGroupAction::class,
    ];
}
