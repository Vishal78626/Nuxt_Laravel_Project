<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\HttpStatus;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $user = UserResource::collection(User::all());
            return response()->json([
                "result" => $user,
                "status" => "success",
                "message" => "Successful operation"
            ], HttpStatus::OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to get users',
                'error' => $e->getMessage(),
            ], HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created user into DB.
     * 
     * @param UserRequest $userRequest
     * @return JsonResponse
     */
    public function store(UserRequest $userRequest): JsonResponse
    {
        try {
            $validatedRequest = $userRequest->validated();
            $user = User::create($validatedRequest);
            $token = $user->createToken('token-name')->plainTextToken;

            $userData = new UserResource($user);
            return response()->json([
                "result" => $userData,
                "status" => "success",
                "message" => "Successful operation",
                "token" => $token,
            ], HttpStatus::CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'User creation failed',
                'error' => $e->getMessage(),
            ], HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
     * 
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();
            $user->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User removed successfully',
            ], HttpStatus::NO_CONTENT);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to remove user',
                'error' => $e->getMessage(),
            ], HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }
}
