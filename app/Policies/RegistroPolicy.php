<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Registro;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistroPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Registro');
    }

    public function view(AuthUser $authUser, Registro $registro): bool
    {
        return $authUser->can('View:Registro');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Registro');
    }

    public function update(AuthUser $authUser, Registro $registro): bool
    {
        return $authUser->can('Update:Registro');
    }

    public function delete(AuthUser $authUser, Registro $registro): bool
    {
        return $authUser->can('Delete:Registro');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Registro');
    }

    public function restore(AuthUser $authUser, Registro $registro): bool
    {
        return $authUser->can('Restore:Registro');
    }

    public function forceDelete(AuthUser $authUser, Registro $registro): bool
    {
        return $authUser->can('ForceDelete:Registro');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Registro');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Registro');
    }

    public function replicate(AuthUser $authUser, Registro $registro): bool
    {
        return $authUser->can('Replicate:Registro');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Registro');
    }

}