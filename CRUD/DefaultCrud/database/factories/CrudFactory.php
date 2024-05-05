<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crud>
 */
class CrudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->realText(20),
            'number' => $this->faker->randomNumber(),
            'checkbox' => $this->faker->randomElement(['checkbox1', 'checkbox2']),
            'radio' => $this->faker->randomElement(['yes', 'no']),
            'select' => $this->faker->randomElement(['option1', 'option2', 'option3']),
            'date' => $this->faker->date,
            'range' => $this->faker->numberBetween(1, 10),
            // 'file' => asset('http://127.0.0.1:8000/img/ohto-title.png'),
            'file' => $this->faker->imageUrl(),
            'color' => $this->faker->hexcolor,
            'hidden' => $this->faker->word,
        ];
    }
}
