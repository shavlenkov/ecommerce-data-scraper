<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface AuthServiceContract
{
    public function createBearerToken(array $data): JsonResponse;
    public function deleteBearerToken(): void;
}
