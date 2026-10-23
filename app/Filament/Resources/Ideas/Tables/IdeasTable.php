<?php

// Soto Palao Maximiliano. Grupo: 1592

namespace App\Filament\Resources\Ideas\Tables;

use App\Filament\Resources\Ideas\Schemas\IdeaInfolist;
use App\Models\Idea;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Textarea;

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
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('autor')
                    ->label('Autor')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
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
                TrashedFilter::make(), // Filtro para mostrar registros eliminados
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Ver')
                    ->icon(Heroicon::OutlinedEye)
                    ->color('primary')
                    ->modalHeading(fn (Idea $record): string => $record->titulo)
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->schema(IdeaInfolist::components()),
                EditAction::make(),
                DeleteAction::make(), // Acción de borrado suave
                RestoreAction::make(), // Acción de restauración
                ForceDeleteAction::make(), // Acción de borrado permanente
                Action::make('aprobar')->label('Aprobar')
                ->color('success')->requiresConfirmation()
                ->modalHeading('Aprobación')
                ->modalDescription('¿Deseas aprobar esta idea?')

                ->action(function (Idea $record) {
                    $record->update(['estado' => 'aprobada']);

                    Notification::make()
                    ->title('Idea aprobada correctamente')
                    ->success()
                    ->send();
                }),
                Action::make('rechazar')->label('Rechazar')
                ->color('danger')->requiresConfirmation()
                ->modalHeading('Rechazo')
                ->modalDescription('¿Deseas rechazar esta idea?')
                ->schema([
                    Textarea::make('observacion')
                        ->label('Motivo del rechazo')
                        ->required()
                        ->rows(4),
                ])
                ->action(function (Idea $record) {
                    $record->update([
                        'estado' => 'rechazada',
                        'observacion' => $data['observacion'],
                    ]);

                    Notification::make()
                    ->title('Idea rechazada correctamente')
                    ->success()
                    ->send();
                })
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                   // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
