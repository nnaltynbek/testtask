<?php

namespace App\Services\System;

use App\Http\Requests\Api\LoginRequest;

interface AuthService
{
    public function login(LoginRequest $request);
}