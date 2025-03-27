<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isSuperUser();
    }

    public function view(User $user): bool
    {
        return $user->isSuperUser();
    }

    public function create(User $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(User $user): bool
    {
        return $user->isSuperUser();
    }

    public function delete(User $user): bool
    {
        return $user->isSuperUser();
    }

    public function search(User $user): bool
    {
        return $user->isSuperUser();
    }
}
