<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait DataQuery
{
    /**
     * Filter the query.
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        $query->when($filters['search'] ?? null, function (Builder $query, string $search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['role'] ?? null, function (Builder $query, string $role) {
            $query->whereHas('roles', function (Builder $query) use ($role) {
                $query->where('name', $role);
            });
        });
        $query->when($filters['permission'] ?? null, function (Builder $query, string $permission) {
            $query->whereHas('permissions', function (Builder $query) use ($permission) {
                $query->where('name', $permission);
            });
        });
        $query->when($filters['sort'] ?? null, function (Builder $query, string $sort) {
            $query->orderBy($sort, 'asc');
        });
        return $query;
    }
    /**
     * 
     */
    public function scopeWithRelations(Builder $query, array $relations): Builder
    {
        $query->when($relations, function (Builder $query, array $relations) {
            $query->with($relations);
        });
        return $query;
    }
    /**
     * Get relations.
     */
    public function getRelations(): array
    {
        return $this->relations;
    }
    /**
     * Get relation columns.
     */
    public function getRelationColumns(): array
    {
        $columns = [];
        foreach ($this->getRelations() as $relation) {
            $columns[] = $relation . '.name as ' . $relation;
        }
        return $columns;
    }

    /**
     * Get relation columns.
     */
    public function getRelationColumnsWithId(): array
    {
        $columns = [];
        foreach ($this->getRelations() as $relation) {
            $columns[] = $relation . '.id as ' . $relation . '_id';
            $columns[] = $relation . '.name as ' . $relation;
        }
        return $columns;
    }  
    
    /**
     * Reject columns.
     */

    public function rejectColumns(array $columns): array
    {
       return $this->reject( function ($value, $key) use ($columns) {
            return in_array($value, $columns);
        });
    }
}
