<?php

namespace App\Policies;

use App\Models\Officar;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OfficerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Officar $officer)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->id === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Officar $officer)
    {
        return $user->id === 1 || $user->id === $officer->office_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Officar $officer)
    {
        return $user->id === 1;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Officar $officer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Officar $officer)
    {
        //
    }
}
