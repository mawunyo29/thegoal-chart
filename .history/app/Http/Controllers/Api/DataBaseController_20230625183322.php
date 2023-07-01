<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    protected $model;
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
        $relationships = $this->model->getRelations();
        dd($relationships);
    }

    public function getModelTable()
    {
        return $this->model->getTable();
    }

    public function getModelColumns()
    {
        $columns = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $columns;
    }

    public function getModelRelationships()
    {
        $relationships = $this->model->getRelationships();
        return $relationships;
    }

    public function getModelRelationshipsTable()
    {
        $relationships = $this->model->getRelationships();
        $relationshipsTable = [];
        foreach ($relationships as $relationship) {
            $relationshipsTable[] = $relationship->getTable();
        }
        return $relationshipsTable;
    }
}
