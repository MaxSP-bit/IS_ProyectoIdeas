<?php

namespace App\Filament\Resources\Categorias\Pages;

use App\Filament\Resources\Categorias\CategoriaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoria extends EditRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
        {
            return 'Categoría actualizada exitosamente!';
        }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
            ->hidden(fn ($record) => $record->ideas()->exists()), // Oculta el botón de eliminar si la categoría tiene ideas asociadas
        ];
    }
}
