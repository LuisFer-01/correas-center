<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CapacidadInfraestructura;
use Illuminate\Auth\Access\HandlesAuthorization;

class CapacidadInfraestructuraPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CapacidadInfraestructura');
    }

    public function view(AuthUser $authUser, CapacidadInfraestructura $capacidadInfraestructura): bool
    {
        return $authUser->can('View:CapacidadInfraestructura');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CapacidadInfraestructura');
    }

    public function update(AuthUser $authUser, CapacidadInfraestructura $capacidadInfraestructura): bool
    {
        return $authUser->can('Update:CapacidadInfraestructura');
    }

    public function delete(AuthUser $authUser, CapacidadInfraestructura $capacidadInfraestructura): bool
    {
        return $authUser->can('Delete:CapacidadInfraestructura');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CapacidadInfraestructura');
    }

    public function restore(AuthUser $authUser, CapacidadInfraestructura $capacidadInfraestructura): bool
    {
        return $authUser->can('Restore:CapacidadInfraestructura');
    }

    public function forceDelete(AuthUser $authUser, CapacidadInfraestructura $capacidadInfraestructura): bool
    {
        return $authUser->can('ForceDelete:CapacidadInfraestructura');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CapacidadInfraestructura');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CapacidadInfraestructura');
    }

    public function replicate(AuthUser $authUser, CapacidadInfraestructura $capacidadInfraestructura): bool
    {
        return $authUser->can('Replicate:CapacidadInfraestructura');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CapacidadInfraestructura');
    }

}