<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataBaseController extends Controller
{
    protected $currentModel;
    protected $model;
    protected $rejectedColumns = [];

    public function getModel(Request $request): JsonResponse
    {
        $modelName = $request->model;
        $this->currentModel = 'App\Models\\' . $modelName;
        $this->currentModel = new $this->currentModel();

        return response()->json([
            'success' => true,
            'data' => $this->currentModel->with($this->currentModel->ModelRelations())->get()
        ]);
    }

    public function modelQuery()
    {
        return $this->currentModel->query();
    }

    public function complexQuery(Request $request): JsonResponse
    {
        $modelName = $request->model;
        $this->currentModel = 'App\Models\\' . $modelName;
        $this->currentModel = new $this->currentModel();

        $datas = $this->modelQuery();
        $search = $request->search;
        
         $model =$this->currentModel->getModel();
        $data = $model->scopeModelFilterWithRelations( $search)->get();
  
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

   
}
