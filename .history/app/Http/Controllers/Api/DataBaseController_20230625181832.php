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
         'App\Models\\'.$model;
        $this->model = new $this->model();
        dd($this->model);
    }

    public function getModelTable()
    {
        return $this->model->getTable();
    }

    public function getModelColumns($model)
    {
        return $model->getFillable();
    }

   
}