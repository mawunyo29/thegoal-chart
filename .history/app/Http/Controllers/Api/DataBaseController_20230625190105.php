<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    protected $model;
    protected $rejectedColumns = ['id', 'created_at', 'updated_at', 'deleted_at'];
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
        $this->getColumns();
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

     /**
      * Get the columns of the model
      */

        public function getColumns()
        {
            $columns = $this->getModelColumns();
            $columns->reject(function ($value, $key) {
                return in_array($value, $this->rejectedColumns);
            });
            dd($columns);
            return $columns;
        }

    /**
     * Set session
     */
    public function setSession($request)
    {
        $request->session()->put('model', $this->model);
        $request->session()->put('modelTable', $this->getModelTable());
        $request->session()->put('modelColumns', $this->getColumns());
        $request->session()->put('modelRelationships', $this->getModelRelationships());
        $request->session()->put('modelRelationshipsTable', $this->getModelRelationshipsTable());
        $request->session()->put('modelRelationshipsColumns', $this->getModelRelationshipsColumns());
    }

    /**
     * Get session
     */
    public function getSession($request)
    {
        $this->model = $request->session()->get('model');
       
    }

    /**
     * Get all data
     */

    public function getAllData()
    {
        $data = $this->model::with($this->getModelRelationshipsTable())->get();
        return $data;
    }

    /**
     * reset session
     */
    
    public function resetSession($request)
    {
        if($request->session()->has('model'))

        $request->session()->forget('model');
    }

}
