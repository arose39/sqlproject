<?php declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class StudentFilter extends QueryFilter
{

    public function search_first_name(string $search_string = ''): Builder
    {
        return $this->builder
            ->where('first_name', 'LIKE', '%' . $search_string . '%');
    }

    public function search_last_name($search_string = ''): Builder
    {
        return $this->builder
            ->where('first_name', 'LIKE', '%' . $search_string . '%');
    }

    public function group_id($id = null): Builder
    {
        if ($id === "n/a") {
            return $this->builder->where('group_id', null);
        }

        return $this->builder->when($id, function ($query) use ($id) {
            $query->where('group_id', $id);
        });
    }

    public function course_id($id = null): Builder
    {
        return $this->builder->when($id, function ($query) use ($id) {
            $query->whereRelation('courses', 'course_id', $id);
        });
    }
}
