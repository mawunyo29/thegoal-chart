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
        $this->getClass();
        $this->getModelTable();
        $this->getModelColumns();
        $this->setSession($request);

        return response()->json([
            'success' => true,
            'data' =>  $this->currentModel
        ]);
    }

}
