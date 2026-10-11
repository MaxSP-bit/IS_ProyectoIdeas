<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->helperText('Ingresa el nombre de la categoría')
                    ->placeHolder('Ej. Categoría')
                   
                    ->label('Nombre de categoría'),
                    
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->helperText('Ingresa la descripción de la categoría')
                    ->placeHolder('Ej. Esta categoría se relaciona con ...')
                    ->columnSpanFull(),
            ]);
    }
}
