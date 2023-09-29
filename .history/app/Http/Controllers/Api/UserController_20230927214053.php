<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Cursor;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        $users = UserResource::collection(User::with('roles')->paginate(10));
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function cursorPaginateUsers(Request $request)
    {
        $cursor =$request->query('cursor') ?? null;
        $nextCursor = Cursor::fromEncoded($cursor);
        $users = User::cursorPaginate(10, ['*'], 'cursor', $nextCursor);
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }
}
