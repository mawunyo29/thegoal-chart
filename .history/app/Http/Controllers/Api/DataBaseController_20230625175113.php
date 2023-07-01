<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    

    public function index($model) : \Illuminate\Http\JsonResponse
    {
        dd($model);
       
    }
}
