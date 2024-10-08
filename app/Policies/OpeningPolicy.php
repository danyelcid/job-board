<?php

namespace App\Policies;

use App\Models\Opening;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OpeningPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }
    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Opening $opening): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Opening $opening): bool | Response
    {
        if ($opening->employer->user_id !== $user->id)
        {
          return false;
        }

        if ( $opening->openingApplications()->count() > 0)
        {
            return Response::deny("You can't update an opening with applications!");
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Opening $opening): bool
    {
        return $opening->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Opening $opening): bool
    {
        return $opening->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Opening $opening): bool
    {
        return $opening->employer->user_id === $user->id;
    }

    public function apply(User $user, Opening $opening): bool
    {
        return !$opening->hasUserApplied($user);
    }
}
