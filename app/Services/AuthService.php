<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

use App\Contracts\AuthServiceContract;

use App\Models\User;

class AuthService implements AuthServiceContract
{
    /**
     * Method for creating a Bearer token
     *
     * @param array $data
     * @return JsonResponse
     */
    public function createBearerToken(array $data): JsonResponse
    {
        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Invalid email or password!',
            ], 401);
        }

        $user = User::where('email', $data['email'])->firstOrFail();

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'type' => 'Bearer',
            'token' => $token,
        ]);
    }

    /**
     * Method for deleting a Bearer token
     *
     * @return void
     */
    public function deleteBearerToken(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
