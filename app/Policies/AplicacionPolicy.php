<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Aplicacion;
use Illuminate\Auth\Access\HandlesAuthorization;

class AplicacionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Aplicacion');
    }

    public function view(AuthUser $authUser, Aplicacion $aplicacion): bool
    {
        return $authUser->can('View:Aplicacion');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Aplicacion');
    }

    public function update(AuthUser $authUser, Aplicacion $aplicacion): bool
    {
        return $authUser->can('Update:Aplicacion');
    }

    public function delete(AuthUser $authUser, Aplicacion $aplicacion): bool
    {
        return $authUser->can('Delete:Aplicacion');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Aplicacion');
    }

    public function restore(AuthUser $authUser, Aplicacion $aplicacion): bool
    {
        return $authUser->can('Restore:Aplicacion');
    }

    public function forceDelete(AuthUser $authUser, Aplicacion $aplicacion): bool
    {
        return $authUser->can('ForceDelete:Aplicacion');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Aplicacion');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Aplicacion');
    }

    public function replicate(AuthUser $authUser, Aplicacion $aplicacion): bool
    {
        return $authUser->can('Replicate:Aplicacion');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Aplicacion');
    }

}