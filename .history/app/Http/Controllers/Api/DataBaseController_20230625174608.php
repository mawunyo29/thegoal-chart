<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        dd($this->model);
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
