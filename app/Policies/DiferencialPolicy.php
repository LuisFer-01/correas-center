<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Diferencial;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiferencialPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Diferencial');
    }

    public function view(AuthUser $authUser, Diferencial $diferencial): bool
    {
        return $authUser->can('View:Diferencial');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Diferencial');
    }

    public function update(AuthUser $authUser, Diferencial $diferencial): bool
    {
        return $authUser->can('Update:Diferencial');
    }

    public function delete(AuthUser $authUser, Diferencial $diferencial): bool
    {
        return $authUser->can('Delete:Diferencial');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Diferencial');
    }

    public function restore(AuthUser $authUser, Diferencial $diferencial): bool
    {
        return $authUser->can('Restore:Diferencial');
    }

    public function forceDelete(AuthUser $authUser, Diferencial $diferencial): bool
    {
        return $authUser->can('ForceDelete:Diferencial');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Diferencial');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Diferencial');
    }

    public function replicate(AuthUser $authUser, Diferencial $diferencial): bool
    {
        return $authUser->can('Replicate:Diferencial');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Diferencial');
    }

}