<?php

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class IdeaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required(),
                Textarea::make('descripcion')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('estado')
                    ->required()
                    ->default('registrada'),
                TextInput::make('autor')
                    ->required(),
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->required(),
            ]);
    }
}
