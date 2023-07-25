<?php

namespace App\Core\Utils;

use App\Models\Core\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class JwtUtil
{
    public static function generateTokenFromUser(User $user): string
    {
        return JWTAuth::fromUser($user);
    }
}
