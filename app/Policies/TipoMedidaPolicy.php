<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\TipoMedida;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoMedidaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:TipoMedida');
    }

    public function view(AuthUser $authUser, TipoMedida $tipoMedida): bool
    {
        return $authUser->can('View:TipoMedida');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:TipoMedida');
    }

    public function update(AuthUser $authUser, TipoMedida $tipoMedida): bool
    {
        return $authUser->can('Update:TipoMedida');
    }

    public function delete(AuthUser $authUser, TipoMedida $tipoMedida): bool
    {
        return $authUser->can('Delete:TipoMedida');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:TipoMedida');
    }

    public function restore(AuthUser $authUser, TipoMedida $tipoMedida): bool
    {
        return $authUser->can('Restore:TipoMedida');
    }

    public function forceDelete(AuthUser $authUser, TipoMedida $tipoMedida): bool
    {
        return $authUser->can('ForceDelete:TipoMedida');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:TipoMedida');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:TipoMedida');
    }

    public function replicate(AuthUser $authUser, TipoMedida $tipoMedida): bool
    {
        return $authUser->can('Replicate:TipoMedida');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:TipoMedida');
    }

}