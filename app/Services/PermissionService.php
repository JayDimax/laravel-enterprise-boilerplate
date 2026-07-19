<?php

namespace App\Services;

use App\Models\User;

class PermissionService
{
    public function syncRoles(User $user, array $roles): User
    {
        $user->syncRoles($roles);

        return $user->load('roles');
    }

    public function syncPermissions(User $user, array $permissions): User
    {
        $user->syncPermissions($permissions);

        return $user->load('permissions');
    }
}
