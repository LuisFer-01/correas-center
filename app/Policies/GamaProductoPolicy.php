<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\GamaProducto;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamaProductoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:GamaProducto');
    }

    public function view(AuthUser $authUser, GamaProducto $gamaProducto): bool
    {
        return $authUser->can('View:GamaProducto');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:GamaProducto');
    }

    public function update(AuthUser $authUser, GamaProducto $gamaProducto): bool
    {
        return $authUser->can('Update:GamaProducto');
    }

    public function delete(AuthUser $authUser, GamaProducto $gamaProducto): bool
    {
        return $authUser->can('Delete:GamaProducto');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:GamaProducto');
    }

    public function restore(AuthUser $authUser, GamaProducto $gamaProducto): bool
    {
        return $authUser->can('Restore:GamaProducto');
    }

    public function forceDelete(AuthUser $authUser, GamaProducto $gamaProducto): bool
    {
        return $authUser->can('ForceDelete:GamaProducto');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:GamaProducto');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:GamaProducto');
    }

    public function replicate(AuthUser $authUser, GamaProducto $gamaProducto): bool
    {
        return $authUser->can('Replicate:GamaProducto');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:GamaProducto');
    }

}