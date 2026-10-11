<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
class PracticaFormulario extends Page implements HasSchemas
{
 use InteractsWithSchemas;
 protected string $view = 'filament.pages.practica-formulario';
 public ?array $data = [];
 public function mount(): void
 {
 $this->form->fill();
 }
 public function form(Schema $schema): Schema
 {
 return $schema
 ->components([
 Section::make('Nombre alumno')
 ->schema([
 TextInput::make('nombre')
 ->label('Nombre del proyecto')
 ->required(),
 ]),
 ])
 ->statePath('data');
 }
 public function guardar(): void
 {
 $datos = $this->form->getState();
 }
}