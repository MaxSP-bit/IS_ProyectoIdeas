<?php

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;

class IdeaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components(self::components()); // Registra las secciones reutilizables de detalles en el esquema del recurso.
    }

    /**
     * Define los componentes que usa el modal de consulta de ideas.
     *
     * @return array<Component>
     */
    public static function components(): array
    {
        return [
            Section::make('Información idea') // Agrupa los campos que describen el contenido principal de la idea.
                ->icon(Heroicon::OutlinedLightBulb) // Identifica visualmente esta sección.
                ->iconColor('primary') // Usa el color primario del panel para el icono de la sección.
                ->schema([
                    TextEntry::make('titulo') // Lee el título desde el atributo "titulo" del modelo Idea.
                        ->label('Título') // Muestra una etiqueta legible en lugar del nombre del atributo.
                        ->beforeLabel(Icon::make(Heroicon::OutlinedLightBulb)->color('gray')) // Coloca un icono gris antes de la etiqueta.
                        ->size(TextSize::Large) // Destaca el título respecto a los demás valores.
                        ->weight(FontWeight::Bold) // Presenta el título en negrita.
                        ->columnSpanFull(), // Permite que el título use todo el ancho disponible.
                    TextEntry::make('descripcion') // Lee la descripción desde el atributo "descripcion" del modelo.
                        ->label('Descripción') // Identifica el contenido como descripción.
                        ->beforeLabel(Icon::make(Heroicon::OutlinedDocumentText)->color('gray')) // Coloca un icono gris antes de la etiqueta.
                        ->prose() // Aplica formato de lectura al texto descriptivo.
                        ->columnSpanFull(), // Evita comprimir la descripción junto a otros campos.
                ])
                ->columns(2), // Distribuye los componentes de la sección en dos columnas.
            Section::make('Registro y seguimiento') // Separa los datos administrativos del contenido de la idea.
                ->icon(Heroicon::OutlinedClock) // Identifica la sección de seguimiento.
                ->iconColor('primary') // Usa el color primario del panel para este icono.
                ->schema([
                    TextEntry::make('estado') // Lee el estado actual de la idea.
                        ->label('Estado') // Identifica el valor como estado.
                        ->badge() // Resalta el estado mediante una insignia.
                        ->color(fn (string $state): string => match ($state) { // Asigna un color semántico según el estado.
                            'aprobada' => 'success', // Verde indica una idea aprobada.
                            'en revisión' => 'warning', // Amarillo indica que está en revisión.
                            'rechazada' => 'danger', // Rojo indica una idea rechazada.
                            default => 'gray', // Gris se usa para estados no listados.
                        }),
                    TextEntry::make('autor') // Muestra el texto guardado en el campo autor de la idea.
                        ->label('Registrada por') // Indica quién aparece como autor de la idea.
                        ->icon(Heroicon::OutlinedUser) // Añade un icono de usuario al valor.
                        ->iconColor('gray'),
                    TextEntry::make('categoria.nombre') // Lee el nombre de categoría mediante la relación del modelo.
                        ->label('Categoría') // Identifica el valor como categoría.
                        ->icon(Heroicon::OutlinedTag) // Añade un icono de etiqueta al valor.
                        ->iconColor('gray'),
                    TextEntry::make('created_at') // Muestra la marca de tiempo automática de creación.
                        ->label('Fecha de registro') // Identifica la fecha en que se registró la idea.
                        ->dateTime('d/m/Y H:i') // Formatea la fecha como día/mes/año y hora:minuto.
                        ->icon(Heroicon::OutlinedCalendar) // Añade un icono de calendario al valor.
                        ->iconColor('gray'),
                    TextEntry::make('updated_at') // Muestra la marca de tiempo automática de la última actualización.
                        ->label('Última actualización') // Distingue esta fecha de la fecha de registro.
                        ->dateTime('d/m/Y H:i') // Mantiene el mismo formato que la fecha de registro.
                        ->icon(Heroicon::OutlinedClock) // Añade un icono de reloj al valor.
                        ->iconColor('gray'),
                ])
                ->columns(2), // Distribuye los datos de seguimiento en dos columnas.
        ];
    }
}
