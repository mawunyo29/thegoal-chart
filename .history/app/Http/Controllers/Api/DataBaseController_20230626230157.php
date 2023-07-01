<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class DataBaseController extends Controller
{
    protected  $model = [];
    protected $currentModel;
    protected $rejectedColumns = [];
    public $modelTable;
    public $modelColumns;
    public $data = [];

  

    /**
     * Get the model
     */
    public function getModel(Request $request)
    {
        $model = $request->model;
        $this->currentModel = 'App\Models\\' . $model;
       
     
    }
    /**
     * Get class
     */
    public function getClass()
    {
        $model = get_class($this->currentModel);
        //get current class name
        $this->model = substr($model, strrpos($model, '\\') + 1);
        $this->getQuery();
        return $this;
    }
    /**
     * Get the model table name
     */
    public function getModelTable()
    {
        return $this->getClass()->getTable();
    }
    /**
     * Get the columns of the model
     */
    public function getModelColumns()
    {
        $columns = $this->currentModel->getConnection()->getSchemaBuilder()->getColumnListing($this->currentModel->getTable());
        return $columns;
    }
    /**
     * Get the relationships of the model
     */
    public function getModelRelationships()
    {
        $relationships = $this->currentModel->getRelations();
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
    public function setSession($request)
    {
        session(['modelData' => $this->currentModel]);
        session(['modelTable' => $this->getModelTable()]);
        session(['modelColumns' => $this->getModelColumns()]);
     
    }

    /**
     * Get session
     */
    public function getSession()
    {
        $model = session()->get('model');
        $modelTable = session()->get('modelTable');
        $modelColumns = session()->get('modelColumns');

        $data = [
            'model' => $model,
            'modelTable' => $modelTable,
            'modelColumns' => $modelColumns,

        ];
        return $data;
    }

    /**
     * Get all data
     */

    public function getAllData()
    {
        $data = $this->currentModel::with($this->getModelRelationshipsTable())->get();
        return $data;
    }

    /**
     * reset session
     */

    public function resetSession($request)
    {
        if ($request->session()->has('model'))

            $request->session()->forget('model');
    }

    /**
     * get table
     */

    public function getTable()
    {
        $table = $this->currentModel->getTable();
        return $table;
    }

    /**
     * get qury
     */

     public function getQuery()
     {
         $query = $this->getCurrentModel();
        
         return response()->json([
            'success' => true,
            'data' => $query
        ]);
     }

     public function getCurrentModel()
     {
         return $this->currentModel::query();
     }
}
