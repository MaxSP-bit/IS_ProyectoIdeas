<?php

namespace App\Filament\Resources\Ideas\Pages;

use App\Filament\Resources\Ideas\IdeaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIdea extends CreateRecord
{

    protected static string $resource = IdeaResource::class;
    protected static ?string $title = 'Crear Idea';
    protected static bool $canCreateAnother = false;

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
        {
            return 'Idea creada exitosamente!';
        }
}