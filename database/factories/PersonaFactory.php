<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grupo_id' => \App\Models\Grupo::factory(),
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(18, 80),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'cedula' => $this->faker->unique()->randomNumber(9, true), // Assuming 9 digits for simplicity, adjust as needed
            'telefono' => $this->faker->randomNumber(9, true),
            'alergias' => $this->faker->optional()->sentence(),
            'alergias_varias' => $this->faker->optional()->sentence(),
            'observaciones' => $this->faker->optional()->paragraph(),
        ];
    }
}
