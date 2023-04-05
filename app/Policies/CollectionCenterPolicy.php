<?php

namespace App\Policies;

use App\Models\CollectionCenter;
use App\Models\User;

class CollectionCenterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->canAccessAdminPanel();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CollectionCenter $collectionCenter): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return in_array(
            $collectionCenter->getKey(),
            $user->collection_center_ids
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CollectionCenter $collectionCenter): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CollectionCenter $collectionCenter): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CollectionCenter $collectionCenter): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can attach any user to the collection center.
     *
     * @param  \App\Models\CollectionCenter  $collectionCenter
     */
    public function attachAnyUser(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can attach any user to the collection center.
     */
    public function attachUser(User $user, CollectionCenter $collectionCenter, User $detachUser): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can detach the user of the collection center.
     */
    public function detachUser(User $user, CollectionCenter $collectionCenter, User $detachUser): bool
    {
        return $user->isAdmin();
    }
}
