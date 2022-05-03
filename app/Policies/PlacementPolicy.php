<?php

namespace App\Policies;

use App\Models\Placement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlacementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return in_array($user->employee->job->id,[1,6]);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Placement $placement)
    {
        return in_array($user->employee->job->id,[1,6]);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return in_array($user->employee->job->id,[1,6]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Placement $placement)
    {
        return in_array($user->employee->job->id,[1]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Placement $placement)
    {
        return in_array($user->employee->job->id,[1]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Placement $placement)
    {
        return in_array($user->employee->job->id,[1]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Placement  $placement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Placement $placement)
    {
        return in_array($user->employee->job->id,[1]);
    }
}
