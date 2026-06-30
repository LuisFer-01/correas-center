<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Caracteristica;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaracteristicaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Caracteristica');
    }

    public function view(AuthUser $authUser, Caracteristica $caracteristica): bool
    {
        return $authUser->can('View:Caracteristica');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Caracteristica');
    }

    public function update(AuthUser $authUser, Caracteristica $caracteristica): bool
    {
        return $authUser->can('Update:Caracteristica');
    }

    public function delete(AuthUser $authUser, Caracteristica $caracteristica): bool
    {
        return $authUser->can('Delete:Caracteristica');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Caracteristica');
    }

    public function restore(AuthUser $authUser, Caracteristica $caracteristica): bool
    {
        return $authUser->can('Restore:Caracteristica');
    }

    public function forceDelete(AuthUser $authUser, Caracteristica $caracteristica): bool
    {
        return $authUser->can('ForceDelete:Caracteristica');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Caracteristica');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Caracteristica');
    }

    public function replicate(AuthUser $authUser, Caracteristica $caracteristica): bool
    {
        return $authUser->can('Replicate:Caracteristica');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Caracteristica');
    }

}