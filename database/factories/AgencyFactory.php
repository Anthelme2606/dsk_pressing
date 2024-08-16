<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'contact' => $this->faker->phoneNumber(),
            'country_id' => $this->faker->numberBetween(1, 3),
            'pressing_id' => $this->faker->numberBetween(1, 3),
            'status' => true,
        ];
    }
}
