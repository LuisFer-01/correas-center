<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Filament\Resources\Profiles\ProfileResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Perfil actualizado correctamente';
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Si no se proporcionó contraseña, mantener la actual
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $record->update($data);

        Notification::make()
            ->title('Perfil actualizado')
            ->body('Tu información de perfil ha sido actualizada correctamente.')
            ->success()
            ->send();

        return $record;
    }
}
