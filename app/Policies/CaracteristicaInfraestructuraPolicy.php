<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CaracteristicaInfraestructura;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaracteristicaInfraestructuraPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CaracteristicaInfraestructura');
    }

    public function view(AuthUser $authUser, CaracteristicaInfraestructura $caracteristicaInfraestructura): bool
    {
        return $authUser->can('View:CaracteristicaInfraestructura');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CaracteristicaInfraestructura');
    }

    public function update(AuthUser $authUser, CaracteristicaInfraestructura $caracteristicaInfraestructura): bool
    {
        return $authUser->can('Update:CaracteristicaInfraestructura');
    }

    public function delete(AuthUser $authUser, CaracteristicaInfraestructura $caracteristicaInfraestructura): bool
    {
        return $authUser->can('Delete:CaracteristicaInfraestructura');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CaracteristicaInfraestructura');
    }

    public function restore(AuthUser $authUser, CaracteristicaInfraestructura $caracteristicaInfraestructura): bool
    {
        return $authUser->can('Restore:CaracteristicaInfraestructura');
    }

    public function forceDelete(AuthUser $authUser, CaracteristicaInfraestructura $caracteristicaInfraestructura): bool
    {
        return $authUser->can('ForceDelete:CaracteristicaInfraestructura');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CaracteristicaInfraestructura');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CaracteristicaInfraestructura');
    }

    public function replicate(AuthUser $authUser, CaracteristicaInfraestructura $caracteristicaInfraestructura): bool
    {
        return $authUser->can('Replicate:CaracteristicaInfraestructura');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CaracteristicaInfraestructura');
    }

}