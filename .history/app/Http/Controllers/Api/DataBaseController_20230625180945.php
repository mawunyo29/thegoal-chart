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
       
        if(!class_exists('App\Models\\'.$model))
            return response()->json([
                'success' => false,
                'message' => 'Model not found'
            ], 404);
        $this->model = 'App\Models\\'.$model;
        $model = new $this->model();
        
        dd($model);
    }


   
}
