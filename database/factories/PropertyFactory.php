<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentences(4, true),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'capacity' => $this->faker->numberBetween(0, 100),
            'owner_id' => User::factory(),
            'validated' => false,
        ];
    }

    public function validated(): static
    {
        return $this->state(fn () => ['validated' => true]);
    }
}
