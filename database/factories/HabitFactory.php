<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $habits = [
            'Beber Água',
            'Exercitar-se',
            'Ler um Livro',
            'Meditar',
            'Dormir Cedo',
        ];
        return [
            'user_id' => '1',
            'name' => $this->faker->unique()->randomElement($habits),
        ];
    }
}
