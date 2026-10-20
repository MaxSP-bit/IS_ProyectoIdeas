<?php

namespace App\Filament\Resources\Ideas\Schemas;

use filament\infolists\Components\TextEntry; // Sirve para mostrar un texto en la lista de información
use Filament\Schemas\Schema;

class IdeaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('titulo') // Sirve para mostrar el título de la idea en la lista de información
                    ->label('Título') // Sirve para mostrar un título en el formulario
            ]);
    }
}
