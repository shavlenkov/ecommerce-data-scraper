<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

use App\Http\Resources\UserResource;

use App\Models\User;

interface UserServiceContract
{
    public function getAllUsers(): AnonymousResourceCollection;
    public function getOneUser(User $user): UserResource;
    public function createUser(array $data): void;
    public function updateUser(array $data, User $user): void;
    public function deleteUser(User $user) : void;
}
