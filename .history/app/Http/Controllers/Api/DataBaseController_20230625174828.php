<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    protected Model $model;

    public function __construct($model)
    {
        dd($model);
       
    }

    public function index() : \Illuminate\Http\JsonResponse
    {
        dd($this->model);
        $data = $this->model::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
