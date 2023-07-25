<?php

namespace App\Policies;

use App\Models\Core\User;

class ProductCategoryPolicy
{

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }

    public function createOrUpdate(User $user): bool
    {
        return $this->update($user) && $this->create($user);
    }

}
