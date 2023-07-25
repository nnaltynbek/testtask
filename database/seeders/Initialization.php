<?php

namespace Database\Seeders;

use App\Models\Core\Role;
use App\Models\Core\User;
use Illuminate\Database\Seeder;

class Initialization extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'ADMIN',
                'id' => Role::ROLE_ADMIN_ID
            ],
            [
                'name' => 'USER',
                'id' => Role::ROLE_USER_ID
            ],
        ];
        Role::query()->insert($roles);

        $users = [
            'email' => 'test@gmail.com',
            'password' => bcrypt('test'),
            'name' => 'test',
            'role_id' => Role::ROLE_ADMIN_ID
        ];
        User::query()->insert($users);

    }
}