<?php

namespace App\Providers;

use App\Actions\Student\AddCoursesToStudentAction;
use App\Actions\Student\CreateStudentAction;
use App\Actions\Student\CreateStudentGroupAction;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
public array $bindings = [
//    CreateStudentAction::class => CreateStudentAction::class,
//    AddCoursesToStudentAction::class => AddCoursesToStudentAction::class,
//    CreateStudentGroupAction::class => CreateStudentGroupAction::class,
];
}
