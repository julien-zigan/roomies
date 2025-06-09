<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('de_DE');
        $fakerForCatchPhrase = \Faker\Factory::create();

        return [
            'name' => $fakerForCatchPhrase->catchPhrase(),
            'street' => $faker->streetName(),
            'house_number' => $faker->buildingNumber(),
            'postal_code' => $faker->postcode(),
            'city' => $faker->city(),
            'main_tenant_id' => null,
            'description' => $faker->text(),
            'mixed_gender' => $faker->boolean(80),
            'pets_allowed' => $faker->boolean(10),
            'square_meters' => $faker->numberBetween(40, 150),
            'num_of_rooms' => 0,
            'seeking_roomie' => $faker->boolean(30),
            'seeking_updated_at' => $faker->dateTimeThisDecade('now', 'Europe/Berlin'),
        ];
    }
}
