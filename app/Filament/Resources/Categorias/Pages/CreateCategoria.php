<?php

namespace App\Filament\Resources\Categorias\Pages;

use App\Filament\Resources\Categorias\CategoriaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoria extends CreateRecord
{
    protected static string $resource = CategoriaResource::class;
    protected static bool $canCreateAnother = false;

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
        {
            return 'Categoría creada exitosamente!';
        }
}
