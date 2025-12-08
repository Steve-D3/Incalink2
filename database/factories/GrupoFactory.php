<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Menu;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grupo>
 */
class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'menu_id' => Menu::factory(),
            'fecha_de_llegada' => $this->faker->dateTimeBetween('now', '+5 month'),
            'fecha_de_salida' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
