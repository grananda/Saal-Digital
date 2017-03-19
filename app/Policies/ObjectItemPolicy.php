<?php

namespace App\Policies;

use App\Models\ObjectItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ObjectItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the objectItem.
     *
     * @param  User $user
     * @param  ObjectItem $objectItem
     * @return mixed
     */
    public function view(User $user, ObjectItem $objectItem)
    {
        //
    }

    /**
     * Determine whether the user can create objectItems.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the objectItem.
     *
     * @param  User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the objectItem.
     *
     * @param  User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return true;
    }
}
