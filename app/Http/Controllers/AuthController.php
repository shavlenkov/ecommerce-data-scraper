<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Services\AuthService;

use App\Http\Requests\SignInUserRequest;

class AuthController extends Controller
{
    /**
     * Constructor of AuthController class
     *
     * @param AuthService $authService
     */
    public function __construct(
        protected AuthService $authService,
    ) {}

    /**
     * Sign In
     *
     * @param SignInUserRequest $request
     * @return JsonResponse
     */
    public function postSignIn(SignInUserRequest $request): JsonResponse
    {
        return $this->authService->createBearerToken($request->validated());
    }

    /**
     * Sign Out
     *
     * @return JsonResponse
     */
    public function postSignOut(): JsonResponse
    {
        $this->authService->deleteBearerToken();

        return response()->json([
            'success' => true,
        ]);
    }
}
