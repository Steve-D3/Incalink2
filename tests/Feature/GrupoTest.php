<?php

namespace Tests\Feature;

use App\Models\Grupo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GrupoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index displays groups.
     */
    public function test_index_displays_grupos(): void
    {
        $user = User::factory()->create();
        $grupos = Grupo::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('grupos.index'));

        $response->assertStatus(200);
        foreach ($grupos as $grupo) {
            $response->assertSee($grupo->nombre);
        }
    }

    /**
     * Test create displays form.
     */
    public function test_create_displays_form(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('grupos.create'));

        $response->assertStatus(200);
    }

    /**
     * Test store creates group.
     */
    public function test_store_creates_grupo(): void
    {
        $user = User::factory()->create();
        $grupoData = [
            'nombre' => 'Nuevo Grupo',
            'fecha_de_llegada' => '2026-01-01',
            'fecha_de_salida' => '2026-01-10',
        ];

        $response = $this->actingAs($user)->post(route('grupos.store'), $grupoData);

        $response->assertRedirect(route('grupos.index'));
        $this->assertDatabaseHas('grupos', $grupoData);
    }

    /**
     * Test store validation errors.
     */
    public function test_store_validation_errors(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('grupos.store'), [
            'nombre' => '',
            'fecha_de_llegada' => 'not-a-date',
            'fecha_de_salida' => '2026-01-01', // Before llegada if llegada was valid, but let's test required/date first
        ]);

        $response->assertSessionHasErrors(['nombre', 'fecha_de_llegada']);
    }

    /**
     * Test store validation date order.
     */
    public function test_store_validation_date_order(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('grupos.store'), [
            'nombre' => 'Grupo Test',
            'fecha_de_llegada' => '2026-01-10',
            'fecha_de_salida' => '2026-01-01', // Before llegada
        ]);

        $response->assertSessionHasErrors(['fecha_de_salida']);
    }

    /**
     * Test show displays group.
     */
    public function test_show_displays_grupo(): void
    {
        $user = User::factory()->create();
        $grupo = Grupo::factory()->create();

        $response = $this->actingAs($user)->get(route('grupos.show', $grupo));

        $response->assertStatus(200);
        $response->assertSee($grupo->nombre);
    }

    /**
     * Test edit displays form.
     */
    public function test_edit_displays_form(): void
    {
        $user = User::factory()->create();
        $grupo = Grupo::factory()->create();

        $response = $this->actingAs($user)->get(route('grupos.edit', $grupo));

        $response->assertStatus(200);
        $response->assertSee($grupo->nombre);
    }

    /**
     * Test update updates group.
     */
    public function test_update_updates_grupo(): void
    {
        $user = User::factory()->create();
        $grupo = Grupo::factory()->create();
        $updatedData = [
            'nombre' => 'Grupo Actualizado',
            'fecha_de_llegada' => '2023-02-01',
            'fecha_de_salida' => '2023-02-10',
        ];

        $response = $this->actingAs($user)->put(route('grupos.update', $grupo), $updatedData);

        $response->assertRedirect(route('grupos.index'));
        $this->assertDatabaseHas('grupos', $updatedData);
    }

    /**
     * Test update validation errors.
     */
    public function test_update_validation_errors(): void
    {
        $user = User::factory()->create();
        $grupo = Grupo::factory()->create();

        $response = $this->actingAs($user)->put(route('grupos.update', $grupo), [
            'nombre' => '',
        ]);

        $response->assertSessionHasErrors(['nombre']);
    }

    /**
     * Test destroy deletes group.
     */
    public function test_destroy_deletes_grupo(): void
    {
        $user = User::factory()->create();
        $grupo = Grupo::factory()->create();

        $response = $this->actingAs($user)->delete(route('grupos.destroy', $grupo));

        $response->assertRedirect(route('grupos.index'));
        $this->assertDatabaseMissing('grupos', ['id' => $grupo->id]);
    }
}
