<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Fox;
use App\Models\User;

class FoxPermissions
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Fox $fox): bool
    {
        return ($user->is_admin || $user->is($fox->user));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fox $fox): bool
    {
        return ($user->is_admin || $user->is($fox->user));
    }
}
