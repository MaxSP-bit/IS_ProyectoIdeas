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
                    ->label('Título') // Sirve para mostrar un título en el formulario
                    ->helperText('Ingrese el título de la idea') // Sirve para mostrar un texto de ayuda en el formulario
                    ->placeholder('Titulo idea')
                    ->required(),
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->helperText('Ingrese la descripción de la idea')
                    ->placeholder('Descripción de la idea')
                    ->required()
                    ->columnSpanFull(),
                Select::make('estado')
                    ->label('Estado') // Sirve para mostrar un título en el formulario
                    ->helperText('Seleccione el estado de la idea') // Sirve para mostrar un texto de ayuda en el formulario
                    ->options(\App\Helpers\EstadoIdea::opciones()) // Sirve para mostrar las opciones del select
                    ->default('registrada')
                    ->required(),
                TextInput::make('autor')
                    ->label('Autor')
                    ->helperText('Ingrese el autor de la idea')
                    ->placeholder('Autor idea')
                    ->required(),
                Select::make('categoria_id')
                    ->label('Categoría')
                    ->helperText('Seleccione la categoría de la idea')
                    ->placeholder('Categoría idea')
                    ->relationship('categoria', 'nombre')
                    ->required(),
            ]);
    }
}
