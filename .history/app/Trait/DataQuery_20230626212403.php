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
    public function scopeModelFilter(Model $model, array $filters): Builder
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($model->getTable());
        $query = $model->query();
        $query->when($filters['search'] ?? null, function (Builder $query, string $search) use ($columns) {
            $query->where(function (Builder $query) use ($search, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        });
        $query->when($filters['sort'] ?? null, function (Builder $query, string $sort) {
            $query->orderBy($sort, 'asc');
        });

        $relations = $model->getRelations();



        return $query;
    }

    /**
     * Get the model's relationships columns.
     */
    public function relationColumns($model)
    {
        $relations = $model->getRelations();
        $columns = DB::getSchemaBuilder()->getColumnListing($model->getTable());
        $relationColumns = [];
        foreach ($relations as $relation) {
            $relationColumns[$relation] = DB::getSchemaBuilder()->getColumnListing($relation);
        }
        return $relationColumns;
    }
    /**
     * 
     */
    public static function getColumns($model)
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($model->getTable());
        return $columns;
    }
    /**
     * Get the model's relationships.
     */
    public static function getRelations($model)
    {
        $relations = $model->getRelations();
        return $relations;
    }

    /**
     * Filter the query.
     */
    public function scopeModelFilterWithRelations(Model $model, array $filters): Builder
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($model->getTable());
        $query = $model->query();
        $query->when($filters['search'] ?? null, function (Builder $query, string $search) use ($columns) {
            $query->where(function (Builder $query) use ($search, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        });
        $query->when($filters['sort'] ?? null, function (Builder $query, string $sort) {
            $query->orderBy($sort, 'asc');
        });

        $relations = $model->getRelations();

        $data = $this->relationColumns($model);
        $query->when($filters['relation'] ?? null, function (Builder $query, string $relation, string $search) use ($data ) {
            $query->whereHas($relation, function (Builder $query) use ($data, $relation , $search) {
                foreach ($data[$relation] as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        });

        return $query;
    }
}
