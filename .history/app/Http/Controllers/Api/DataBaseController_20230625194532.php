<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class DataBaseController extends Controller
{
    protected  $model =[];
    protected $currentModel;
    protected $rejectedColumns = [];

    public function __construct($model = [])
    {
        $this->model = $model;
    }

   

    /**
     * Get the model
     */
    public function getModel($model)
    {

        $this->currentModel = 'App\Models\\'.$model;
        $this->currentModel = new $this->currentModel();
        $re =$this->getClass();
        dd($this->model);
       
    }
    /**
     * Get class
     */
    public function getClass()
    {
       $this->model= get_class($this->currentModel);
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
    public function setSession()
    {
       session()->put('model', $this->currentModel);
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
        $this->currentModel = $request->session()->get('model');
       
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
        if($request->session()->has('model'))

        $request->session()->forget('model');
    }

}
