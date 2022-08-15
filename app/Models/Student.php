<?php declare(strict_types=1);

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'student_course',
            'student_id',
            'course_id'
        );
    }

    public function group()
    {
        return $this->belongsTo(Group::class)->withDefault();
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }
}
