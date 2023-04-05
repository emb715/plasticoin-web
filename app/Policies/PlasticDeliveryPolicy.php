<?php

namespace App\Policies;

use App\Models\PlasticDelivery;
use App\Models\User;

class PlasticDeliveryPolicy
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
    public function view(User $user, PlasticDelivery $plasticDelivery): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($plasticDelivery->user()->is($user)) {
            return true;
        }

        return in_array(
            $plasticDelivery->collection_center_id,
            $user->collection_center_ids
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->canAccessAdminPanel();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PlasticDelivery $plasticDelivery): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if (in_array(
            $plasticDelivery->collection_center_id,
            $user->collection_center_ids
        )) {
            return now()->subDay()->isAfter($plasticDelivery->created_at);
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PlasticDelivery $plasticDelivery): bool
    {
        return $user->isAdmin();
    }
}
