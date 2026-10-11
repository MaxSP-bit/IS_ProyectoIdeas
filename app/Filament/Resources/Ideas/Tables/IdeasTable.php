<?php
// Soto Palao Maximiliano. Grupo: 1592

namespace App\Filament\Resources\Ideas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\ViewAction;

class IdeasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->toggleable(),

                    TextColumn::make('titulo')
                    ->label('Idea')
                    ->searchable()
                    ->toggleable(),

                    TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->toggleable(),

                    TextColumn::make('estado')
                    ->label('Estado')
                    ->searchable()
                    ->toggleable(),

                    TextColumn::make('autor')
                    ->label('Autor')
                    ->searchable()
                    ->toggleable(),

                    TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->searchable()
                    ->toggleable(),

                    TextColumn::make('creado')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('actualizado')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                    'registrada' => 'Registrada',
                    'en revisión' => 'En revisión',
                    'aprobada' => 'Aprobada',
                    'rechazada' => 'Rechazada',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
