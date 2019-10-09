<?php
namespace Tests\Concerns;

use App\Helpers\RolesHelper;
use App\User;

trait UserConcerns
{
    public function createUser(array $attributes = [], string $role = RolesHelper::SUPERADMIN) : User
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $user->assignRole($role);

        return $user;
    }
}
