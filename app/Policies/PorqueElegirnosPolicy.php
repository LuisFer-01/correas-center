<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PorqueElegirnos;
use Illuminate\Auth\Access\HandlesAuthorization;

class PorqueElegirnosPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PorqueElegirnos');
    }

    public function view(AuthUser $authUser, PorqueElegirnos $porqueElegirnos): bool
    {
        return $authUser->can('View:PorqueElegirnos');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PorqueElegirnos');
    }

    public function update(AuthUser $authUser, PorqueElegirnos $porqueElegirnos): bool
    {
        return $authUser->can('Update:PorqueElegirnos');
    }

    public function delete(AuthUser $authUser, PorqueElegirnos $porqueElegirnos): bool
    {
        return $authUser->can('Delete:PorqueElegirnos');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PorqueElegirnos');
    }

    public function restore(AuthUser $authUser, PorqueElegirnos $porqueElegirnos): bool
    {
        return $authUser->can('Restore:PorqueElegirnos');
    }

    public function forceDelete(AuthUser $authUser, PorqueElegirnos $porqueElegirnos): bool
    {
        return $authUser->can('ForceDelete:PorqueElegirnos');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PorqueElegirnos');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PorqueElegirnos');
    }

    public function replicate(AuthUser $authUser, PorqueElegirnos $porqueElegirnos): bool
    {
        return $authUser->can('Replicate:PorqueElegirnos');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PorqueElegirnos');
    }

}