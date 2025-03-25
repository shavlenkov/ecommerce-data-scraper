<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface AuthServiceContract
{
    public function createBearerToken(array $data): ?string;
    public function deleteBearerToken(): void;
}
