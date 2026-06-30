<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Suscriptor;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuscriptorPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Suscriptor');
    }

    public function view(AuthUser $authUser, Suscriptor $suscriptor): bool
    {
        return $authUser->can('View:Suscriptor');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Suscriptor');
    }

    public function update(AuthUser $authUser, Suscriptor $suscriptor): bool
    {
        return $authUser->can('Update:Suscriptor');
    }

    public function delete(AuthUser $authUser, Suscriptor $suscriptor): bool
    {
        return $authUser->can('Delete:Suscriptor');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Suscriptor');
    }

    public function restore(AuthUser $authUser, Suscriptor $suscriptor): bool
    {
        return $authUser->can('Restore:Suscriptor');
    }

    public function forceDelete(AuthUser $authUser, Suscriptor $suscriptor): bool
    {
        return $authUser->can('ForceDelete:Suscriptor');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Suscriptor');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Suscriptor');
    }

    public function replicate(AuthUser $authUser, Suscriptor $suscriptor): bool
    {
        return $authUser->can('Replicate:Suscriptor');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Suscriptor');
    }

}