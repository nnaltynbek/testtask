<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\LoginRequest;
use App\Services\System\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function __construct(private readonly AuthService $authService)
    {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->ok(data: $this->authService->login($request));
    }
}