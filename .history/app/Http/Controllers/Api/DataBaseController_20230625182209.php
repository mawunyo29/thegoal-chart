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
       $this->model = 'App\Models\\'.$model;
        $model = new $this->model();
        $this->model = $model;
        dd($this->model->getFillable());
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
