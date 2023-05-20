<?php

namespace App\Policies;

use App\Models\PackingList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackingListPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->employee->job->id,[1,6,7,8,9,10,11,12]);
    }

    public function view(User $user, PackingList $packingList)
    {
        return in_array($user->employee->job->id,[1,6,7,8,9,10,11,12]);
    }


    public function create(User $user)
    {
        return in_array($user->employee->job->id,[1,7]);
    }

    public function update(User $user, PackingList $packingList)
    {
        return in_array($user->employee->job->id,[1,7]);
    }

    public function delete(User $user, PackingList $packingList)
    {
        return in_array($user->employee->job->id,[1,7]);
    }


    public function restore(User $user, PackingList $packingList)
    {
        return in_array($user->employee->job->id,[1,7]);
    }


    public function forceDelete(User $user, PackingList $packingList)
    {
        return in_array($user->employee->job->id,[1,7]);
    }
}
