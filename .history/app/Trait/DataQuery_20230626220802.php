<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait DataQuery
{
    public $model = [];
   

    public function __construct()
    {
        $this->model = $this->getModel();
    }
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
    public function relationColumns()
    {
        $relations = $this->getRelations();
        $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());
        $relationColumns = [];
        foreach ($relations as $relation) {
            $relationColumns[$relation] = DB::getSchemaBuilder()->getColumnListing($relation);
        }
        return $relationColumns;
    }
    /**
     * 
     */
    public function getColumns()
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());
        return $columns;
    }
    /**
     * Get the model's relationships.
     */
    public function getRelations()
    {
        $relations = $this->getRelations();
        return $relations;
    }

    /**
     * Filter the query.
     */
    public function scopeModelFilterWithRelations( array $filters): Builder
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());
        $query = $this->query();
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

        $data = $this->relationColumns($this);
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
