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

    public function getClass(): self
    {
        $modelClass = get_class($this->currentModel);
        $this->model = substr($modelClass, strrpos($modelClass, '\\') + 1);
        $this->getQuery();

        return $this;
    }

    public function getModelTable(): string
    {
        return $this->getClass()->getTable();
    }

    public function getModelColumns(): array
    {
        return $this->currentModel->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->currentModel->getTable());
    }

    public function getModelRelationships(): array
    {
        return $this->currentModel->getRelations();
    }

    public function getModelRelationshipsTable(): array
    {
        $relationships = $this->getModelRelationships();
        $relationshipsTable = [];

        foreach ($relationships as $relationship) {
            $relationshipsTable[] = $relationship->getTable();
        }

        return $relationshipsTable;
    }

    public function getModelRelationshipsColumns(): array
    {
        $relationships = $this->getModelRelationships();
        $relationshipsColumns = [];

        foreach ($relationships as $relationship) {
            $relationshipsColumns= DB::table($relationship)->get();

        }

        return $relationshipsColumns;

    }

    public function rejectColumns(array $columns): void
    {
        $this->rejectedColumns = $columns;
    }

    public function getColumns()
    {
        $columns = $this->getModelColumns();

        $result = collect($columns)->reject(function ($value, $key) {
            return in_array($value, $this->rejectedColumns);
        });

        return $result;
    }

    public function setSession(Request $request): void
    {
        // $request->session()->put('modelData', $this->currentModel);
        // $request->session()->put('modelTable', $this->getModelTable());
        // $request->session()->put('modelColumns', $this->getModelColumns());
    }

    public function getSession(): array
    {
        $model = session()->has('model') ? session()->get('model') : null;
        $modelTable = session()->has('modelTable') ? session()->get('modelTable') : null;
        $modelColumns = session()->has('modelColumns') ? session()->get('modelColumns') : null;

        $data = [
            'model' => $model,
            'modelTable' => $modelTable,
            'modelColumns' => $modelColumns,
        ];

        return $data;
    }

    public function getAllData()
    {
        $data = $this->currentModel::with($this->getModelRelationshipsTable())->get();
        return $data;
    }

    public function resetSession(Request $request)
    {
        if ($request->session()->has('model')) {
            $request->session()->forget('model');
        }
    }

    public function getTable(): string
    {
        return $this->currentModel->getTable();
    }

    public function getQuery()
    {
        $query = $this->currentModel->query();
        return $query;
    }

  

    public function getRelationships()
    {
        $relationships = $this->currentModel->getRelations();

        return $relationships;
    }
}
