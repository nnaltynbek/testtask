<?php

namespace App\Services\System\Impl;

use App\Core\Utils\JwtUtil;
use App\Http\Requests\Api\LoginRequest;
use App\Models\Core\User;
use App\Models\Enums\ErrorCode;
use App\Services\BaseService;
use App\Services\System\AuthService;
use Illuminate\Support\Facades\Hash;

class AuthServiceImpl extends BaseService implements AuthService
{

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->string('email'))->first();
        if ($user && Hash::check($request->string('password'), $user->password)) {
            return [
                'token' => JwtUtil::generateTokenFromUser($user),
                'user' => $user,
            ];
        }
        $this->apiFail([
            'errorCode' => ErrorCode::AUTH_ERROR,
            'errors' => [
                trans('auth.failed')
            ]
        ]);
    }
}