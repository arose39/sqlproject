<?php declare(strict_types=1);

namespace App\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class StudentData extends DataTransferObject
{
    public string $firstName;
    public string $lastName;
    public string $groupId;
    public array $courses;

    public static function fromRequest(Request $request): StudentData
    {
        return new static([
            'firstName' => $request->input('first_name'),
            'lastName' => $request->input('last_name'),
            'groupId' => $request->input('group'),
            'courses' => $request->input('courses'),
        ]);
    }
}
