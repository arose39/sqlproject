<?php declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    public Request $request;
    protected Builder $builder;
    protected string $delimiter = ',';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters(): array|string
    {
        return $this->request->query();
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        //dd($this->filters());
        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }
}
