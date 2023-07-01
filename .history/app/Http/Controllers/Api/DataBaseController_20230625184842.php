<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    protected $model;
    protected $rejectedColumns = [];
    /**
     * Get the model
     */
    public function getModel($model)
    {
        if (!class_exists('App\Models\\' . $model))
            return response()->json([
                'success' => false,
                'message' => 'Model not found'
            ], 404);
        $this->model = 'App\Models\\' . $model;
        $model = new $this->model();
        $this->model = $model;
    }
    /**
     * Get the model table name
     */
    public function getModelTable()
    {
        return $this->model->getTable();
    }
    /**
     * Get the columns of the model
     */
    public function getModelColumns()
    {
        $columns = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $columns;
    }
    /**
     * Get the relationships of the model
     */
    public function getModelRelationships()
    {
        $relationships = $this->model->getRelationships();
        return $relationships;
    }
    /**
     * Get the relationships table name
     */
    public function getModelRelationshipsTable()
    {
        $relationships = $this->getModelRelationships();
        $relationshipsTable = [];
        foreach ($relationships as $relationship) {
            $relationshipsTable[] = $relationship->getTable();
        }
        return $relationshipsTable;
    }

    /**
     * Get the relationships columns
     */
    public function getModelRelationshipsColumns()
    {
        $relationships = $this->getModelRelationships();
        $relationshipsColumns = [];
        foreach ($relationships as $relationship) {
            $relationshipsColumns[] = $relationship->getConnection()->getSchemaBuilder()->getColumnListing($relationship->getTable());
        }
        return $relationshipsColumns;
    }

    /**
     * reject columns
     *
     */

     public function rejectColumns($columns)
     {
         $this->rejectedColumns = $columns;
     }
}
