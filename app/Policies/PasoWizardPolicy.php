<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PasoWizard;
use Illuminate\Auth\Access\HandlesAuthorization;

class PasoWizardPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PasoWizard');
    }

    public function view(AuthUser $authUser, PasoWizard $pasoWizard): bool
    {
        return $authUser->can('View:PasoWizard');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PasoWizard');
    }

    public function update(AuthUser $authUser, PasoWizard $pasoWizard): bool
    {
        return $authUser->can('Update:PasoWizard');
    }

    public function delete(AuthUser $authUser, PasoWizard $pasoWizard): bool
    {
        return $authUser->can('Delete:PasoWizard');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PasoWizard');
    }

    public function restore(AuthUser $authUser, PasoWizard $pasoWizard): bool
    {
        return $authUser->can('Restore:PasoWizard');
    }

    public function forceDelete(AuthUser $authUser, PasoWizard $pasoWizard): bool
    {
        return $authUser->can('ForceDelete:PasoWizard');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PasoWizard');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PasoWizard');
    }

    public function replicate(AuthUser $authUser, PasoWizard $pasoWizard): bool
    {
        return $authUser->can('Replicate:PasoWizard');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PasoWizard');
    }

}