<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('de_DE');

        return [
            'apartment_id' => null,
            'rent' => $faker->numberBetween(100, 500),
            'square_meters' => $faker->numberBetween(5, 25),
        ];
    }
}
