<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupCollection;
use App\Models\Group;

class GroupController extends Controller
{
    public function __invoke(): GroupCollection
    {
        $groups = Group::all();

        return new GroupCollection($groups);
    }
}
