<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

use App\Contracts\AuthServiceContract;

use App\Models\User;

class AuthService implements AuthServiceContract
{
    /**
     * Method for creating a Bearer token
     *
     * @param array $data
     * @return string|null
     */
    public function createBearerToken(array $data): ?string
    {
        if (!Auth::attempt($data)) {
            return null;
        }

        $user = User::where('email', $data['email'])->firstOrFail();

        return $user->createToken('token')->plainTextToken;
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
