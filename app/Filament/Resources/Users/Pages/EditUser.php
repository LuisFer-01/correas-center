<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Usuario actualizado correctamente';
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Guardar los roles temporalmente
        $this->roles = $data['roles'] ?? [];
        unset($data['roles']);

        return $data;
    }

    protected function afterSave(): void
    {
        if (isset($this->roles)) {
            $this->record->syncRoles($this->roles);
        }
    }
}
