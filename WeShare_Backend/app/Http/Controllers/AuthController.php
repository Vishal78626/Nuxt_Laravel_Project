<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\HttpStatus;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Call user registration controller
     * 
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function register(UserRequest $request): JsonResponse
    {
        $userController = new UserController();
        return $userController->store($request);
    }

    /**
     * Authenticate user and generate token upon successful login
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $credentials = $request->validate([
                "email" => "required|email",
                "password" => "required|string|min:8"
            ]);

            $user = User::where('email', $credentials['email'])->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Invalid credentials',
                ], HttpStatus::UNAUTHORIZED);
            }

            $token = $user->createToken('token-name')->plainTextToken;
            $userData = new UserResource($user);

            return response()->json([
                "result" => $userData,
                "status" => "success",
                "message" => "Login successful",
                "token" => $token,
            ], HttpStatus::OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to authenticate user',
                'error' => $e->getMessage(),
            ], HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Invalidate all tokens associated with the authenticated user, effectively logging them out.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        try {
            $user = Auth::user();
            $user->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Logged out successfully',
            ], HttpStatus::OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to logout',
                'error' => $e->getMessage(),
            ], HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }
}
