<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Composicion;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComposicionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Composicion');
    }

    public function view(AuthUser $authUser, Composicion $composicion): bool
    {
        return $authUser->can('View:Composicion');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Composicion');
    }

    public function update(AuthUser $authUser, Composicion $composicion): bool
    {
        return $authUser->can('Update:Composicion');
    }

    public function delete(AuthUser $authUser, Composicion $composicion): bool
    {
        return $authUser->can('Delete:Composicion');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Composicion');
    }

    public function restore(AuthUser $authUser, Composicion $composicion): bool
    {
        return $authUser->can('Restore:Composicion');
    }

    public function forceDelete(AuthUser $authUser, Composicion $composicion): bool
    {
        return $authUser->can('ForceDelete:Composicion');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Composicion');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Composicion');
    }

    public function replicate(AuthUser $authUser, Composicion $composicion): bool
    {
        return $authUser->can('Replicate:Composicion');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Composicion');
    }

}