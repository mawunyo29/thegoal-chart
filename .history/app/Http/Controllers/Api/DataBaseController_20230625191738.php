<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    protected Model $model;
    protected $currentModel;
    protected $rejectedColumns = [];
    /**
     * Get the model
     */
    public function getModel(Request $request, $model)
    {
        if (!class_exists('App\Models\\' . $model))
            return response()->json([
                'success' => false,
                'message' => 'Model not found'
            ], 404);
        $this->currentModel = 'App\Models\\' . $model;

        $model = new $this->model();
        $this->model = $model;
        $this->getColumns();
        $this->setSession($request);
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
        $relationships = $this->model->getRelations();
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
          $result = collect($columns)->reject(function ($value, $key) {
                return in_array($value, $this->rejectedColumns);
            });
            
            return $this;
        }

    /**
     * Set session
     */
    public function setSession()
    {
       session()->put('model', $this->model);
        session()->put('modelTable', $this->getModelTable());
        session()->put('modelColumns', $this->getColumns());
        session()->put('modelRelationships', $this->getModelRelationships());
        session()->put('modelRelationshipsTable', $this->getModelRelationshipsTable());
        session()->put('modelRelationshipsColumns', $this->getModelRelationshipsColumns());
        dd(session()->all());
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
