<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModalCrud>
 */
class ModalCrudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text_input' => $this->faker->realText(20),
            'number_input' => $this->faker->numberBetween(1, 20),
            'file_input' => $this->faker->imageUrl(),
            'dropdown_input' => $this->faker->randomElement(['option1', 'option2', 'option3']),
            'date_input' => $this->faker->date(),
            'color_input' => $this->faker->hexColor,
            'radio_input' => $this->faker->randomElement(['yes', 'no']),
            'hidden_input' => $this->faker->word,
        ];
    }
}
