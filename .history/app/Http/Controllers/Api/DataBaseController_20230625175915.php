<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    
   public function __construct(?Model $model = null)
    {
         dd($model->getTable());
    }
    public function index($model) : \Illuminate\Http\JsonResponse
    {
      $data =  $this->getModel($model);
     
        return response()->json([
            'success' => true,
            'data' => $data->get()
        ]);
       
    }

    public function getModel($model)
    {
        $model = 'App\Models\\'.$model;
        return new $model;
    }


   
}
