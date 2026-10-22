<?php

use App\Filament\Resources\Ideas\Pages\ListIdeas;
use App\Models\Categoria;
use App\Models\Idea;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('opens the read-only information schema from the ideas table', function () {
    $user = User::factory()->create();
    $category = Categoria::create([
        'nombre' => 'Movilidad',
        'descripcion' => 'Propuestas de movilidad urbana.',
    ]);
    $idea = Idea::create([
        'titulo' => 'Ciclovía comunitaria',
        'descripcion' => 'Conectar los barrios con una ciclovía segura.',
        'estado' => 'en revisión',
        'autor' => 'María Pérez',
        'categoria_id' => $category->id,
    ]);

    $this->actingAs($user);
    Filament::setCurrentPanel(Filament::getPanel('admin'));

    $component = Livewire::test(ListIdeas::class)
        ->assertCanSeeTableRecords([$idea])
        ->assertTableActionExists('view', record: $idea)
        ->mountTableAction('view', $idea)
        ->assertActionMounted(TestAction::make('view')->table($idea));

    expect($component->instance()->mountedActionHasSchema())->toBeTrue()
        ->and($component->instance()->mountedActionShouldOpenModal())->toBeTrue();
});
