<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\StoreOrUpdateUserRequest;
use App\Http\Requests\SetRetailersRequest;

use App\Http\Resources\UserResource;

use App\Models\User;

use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Constructor of UserController class
     *
     * @param UserService $userService
     */
    public function __construct(
        protected UserService $userService,
    ) {}

    /**
     * Display a listing of the resource
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        Gate::authorize('viewAny', User::class);

        return $this->userService->getAllUsers();
    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreOrUpdateUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrUpdateUserRequest $request): JsonResponse
    {
        Gate::authorize('create', User::class);

        $this->userService->createUser($request->validated());

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        Gate::authorize('view', $user);

        return $this->userService->getOneUser($user);
    }

    /**
     * Update the specified resource in storage
     *
     * @param StoreOrUpdateUserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(StoreOrUpdateUserRequest $request, User $user): JsonResponse
    {
        Gate::authorize('update', $user);

        $this->userService->updateUser($request->validated(), $user);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        Gate::authorize('delete', $user);

        $this->userService->deleteUser($user);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Set retailers to a user
     *
     * @param SetRetailersRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function setRetailers(SetRetailersRequest $request, User $user): JsonResponse {
        if ($user->role_id === config('app.super_user_role_id')) {
            abort(403);
        }

        Gate::authorize('setRetailers', $user);

        $this->userService->setRetailers($request->validated(), $user);

        return response()->json([
            'success' => true,
        ]);
    }
}
