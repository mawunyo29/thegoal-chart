<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    
    public function getModel(Model $model)
    {
        dd($model);
        $model = 'App\Models\\'.$model;
        return new $model;
    }


   
}
