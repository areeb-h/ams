<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait Searchable
{
    protected function scopeSearch(Builder $query): Builder
    {
        [$searchTerm, $attributes] = $this->parseArguments(func_get_args());

        if (!$searchTerm || !$attributes) {
            return $query;
        }

        return $query->where(function (Builder $query) use ($attributes, $searchTerm) {
            foreach (Arr::wrap($attributes) as $attribute) {
                $this->buildSearchQuery($query, $attribute, $searchTerm);
            }
        });
    }

    /**
     * Build the search query for the given attribute.
     *
     * @param Builder $query
     * @param string $attribute
     * @param string $searchTerm
     */
    protected function buildSearchQuery(Builder $query, string $attribute, string $searchTerm)
    {
        if (str_contains($attribute, '.')) {
            $relations = explode('.', $attribute);
            $relation = array_shift($relations);
            $nestedAttribute = implode('.', $relations);

            $query->orWhereHas($relation, function (Builder $query) use ($nestedAttribute, $searchTerm) {
                $this->buildSearchQuery($query, $nestedAttribute, $searchTerm);
            });
        } else {
            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        }
    }

    /**
     * Parse search scope arguments.
     */
    private function parseArguments(array $arguments): array
    {
        $args_count = count($arguments);

        return match ($args_count) {
            1 => [request(config('searchable.key')), $this->searchableAttributes()],
            2 => is_string($arguments[1])
                ? [$arguments[1], $this->searchableAttributes()]
                : [request(config('searchable.key')), $arguments[1]],
            3 => is_string($arguments[1])
                ? [$arguments[1], $arguments[2]]
                : [$arguments[2], $arguments[1]],
            default => [null, []],
        };
    }

    /**
     * Get searchable columns.
     */
    public function searchableAttributes(): array
    {
        if (method_exists($this, 'searchable')) {
            return $this->searchable();
        }

        return property_exists($this, 'searchable') ? $this->searchable : [];
    }
}
