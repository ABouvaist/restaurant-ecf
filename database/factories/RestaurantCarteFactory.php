<?php

namespace Database\Factories;

use App\Models\RestaurantCarte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RestaurantCarteFactory extends Factory
{
    protected $model = RestaurantCarte::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'shown' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function active(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'shown' => true,
            ];
        });
    }

    public function inactive(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'shown' => false,
            ];
        });
    }
}
