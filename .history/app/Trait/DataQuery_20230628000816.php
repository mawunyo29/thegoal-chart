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
    public function modelFilter(array $filters): Builder
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

        $relations = $this->getRelations();
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
    public function ModelRelations()
    {
        $relations = $this->getRelations();
        return $relations;
    }

    /**
     * Filter the query.
     */
    public function scopeModelFilterWithRelations(array $filters): Builder
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());
        $query = $this->query();
        $data = $this->relationColumns($this);
        
        $query->when($filters['search'] ?? null, function (Builder $query, string $search) use ($columns) {
            $query->where(function (Builder $query) use ($search, $columns) {
                foreach ($columns as $column) {
                    $column = $this->getTable() . '.' . $column;
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        })->when($filters['relation'] ?? null, function (Builder $query, string $relation) use ($data, $filters) {
            $query->whereHas($relation, function (Builder $query) use ($relation, $data, $filters) {
                $query->when($filters['realtionsearch'] ?? null, function (Builder $query, string $realtionsearch) use ($data, $relation) {
                    $query->where(function (Builder $query) use ($realtionsearch, $data, $relation) {
                        foreach ($data[$relation] as $column) {
                           $column = $this->getRelationTableName($relation) . '.' . $column;
                            $query->orWhere($column, 'like', '%' .' Dr. Deon Durgan III' . '%');
                        }
                    });
                });
            });
        })->when($filters['sort'] ?? null, function (Builder $query, string $sort) {
            $query->orderBy($sort, 'asc');
        });
        // $query->when($filters['sort'] ?? null, function (Builder $query, string $sort) {
        //     $query->orderBy($sort, 'asc');
        // });
        return $query;
    }

    /**
     * resolve ambiguous column
     */
    public function resolveColumn($column)
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());
        if (in_array($column, $columns)) {
            $column = $this->getTable() . '.' . $column;
        }
        return $column;
    }

    /**
     * Get model
     */

    public function getDataModel()
    {
        $model = $this;
        $columns = DB::getSchemaBuilder()->getColumnListing($model->getTable());
        $relations = $model->getRelations();
        $relationColumns = [];
        foreach ($relations as $relation) {
            $relationColumns[$relation] = DB::getSchemaBuilder()->getColumnListing($relation);
        }
        return [
            'model' => $model,
            'columns' => $columns,
            'relations' => $relations,
            'relationColumns' => $relationColumns
        ];
    }

    /**
     * Get model name
     */
    public function getModelName()
    {
        $model = $this;
        $modelName = class_basename($model);
        return $modelName;
    }

    /**
     * Get model instance
     */

    public function updateModel($data)
    {
        $this->update($data);
    }

    /**
     *  Make model rules
     */
    public function makeRules($data): array
    {
        $rules = [];
        foreach ($data as $key => $value) {
            $rules[$key] = 'required';
        }
        return $rules;
    }

    public function getRelationTableName($relation)
    {
        $relationTableName = $this->$relation()->getRelated()->getTable();
        return $relationTableName;
    }
   
}
