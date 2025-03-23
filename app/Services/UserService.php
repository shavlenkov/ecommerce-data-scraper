<?php

namespace App\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;

use App\Contracts\UserServiceContract;

use App\Http\Resources\UserResource;

use App\Models\User;

class UserService implements UserServiceContract
{
    /**
     * Method for getting all users with pagination
     *
     * @return AnonymousResourceCollection
     */
    public function getAllUsers(): AnonymousResourceCollection
    {
        return UserResource::collection(
            User::simplePaginate(config('app.pagination_limit'))
        );
    }

    /**
     * Method for getting a specific user
     *
     * @param User $user
     * @return UserResource
     */
    public function getOneUser(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Method for creating a new user
     *
     * @param array $data
     * @return void
     */
    public function createUser(array $data): void
    {
        User::create($data);
    }

    /**
     * Method for updating the data of a specific user
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function updateUser(array $data, User $user): void
    {
        [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
        ] = $data;

        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role_id = $role_id;

        $user->save();
    }

    /**
     * Method for deleting a specific user
     *
     * @param User $user
     * @return void
     */
    public function deleteUser(User $user): void
    {
        $user->delete();
    }
}
