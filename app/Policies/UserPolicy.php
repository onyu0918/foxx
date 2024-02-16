<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\user;

class UserPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, user $model): bool
    {
        return $user->is($model);
    }
}
