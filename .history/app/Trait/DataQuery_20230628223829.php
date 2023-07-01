<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;

trait DataQuery
{
    public $model = [];
    
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
     * Filter the query with model columns.
     */
    public function scopeModelFilter(Builder $query, array $filters): Builder
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());

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

        return $query;
    }

    /**
     * Filter the query with model relations.
     */
    public function scopeModelFilterWithRelations(array $filters): Builder
    {
       $query= $this->with($filters['relation'])
            ->when(isset($filters['search']), function (Builder $query) use ($filters) {
                $search = $filters['search'];
                $query->where(function (Builder $query) use ($search) {
                    $columns = DB::getSchemaBuilder()->getColumnListing($this->getTable());
                    foreach ($columns as $column) {
                        $column = $this->getTable() . '.' . $column;
                        $query->orWhere($column, 'like', '%' . $search . '%');
                    }
                });
            })
            ->when(isset($filters['relation']), function (Builder $query) use ($filters) {
                $relation = $filters['relation'];
                $relationInstance = $this->$relation();
                $relationColumns = DB::getSchemaBuilder()->getColumnListing($relationInstance->getRelated()->getTable());

                $query->orWhereHas($relation, function (Builder $query) use ($relation, $filters, $relationColumns) {
                    $query->when(isset($filters['relationsearch']), function (Builder $query) use ($filters, $relation, $relationColumns) {
                        $relationsearch = $filters['relationsearch'];
                        $query->where(function (Builder $query) use ($relationsearch, $relationColumns, $relation) {
                            foreach ($relationColumns as $column) {
                                $column = $relation . '.' . $column;
                                $query->orWhere($column, 'like', '%' . $relationsearch . '%');
                            }
                        });
                    });
                });
            })
            ->when(isset($filters['sort']), function (Builder $query) use ($filters) {
                $sort = $filters['sort'];
                $query->orderBy($sort, 'asc');
            });

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

    public function orderModel($sort ,$direction)
    {
        $this->orderBy($sort, $direction);
        return $this;
    }
    
   
}
