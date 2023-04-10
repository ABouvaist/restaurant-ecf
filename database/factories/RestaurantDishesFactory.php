<?php

namespace Database\Factories;

use App\Models\RestaurantDishes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RestaurantDishesFactory extends Factory
{
    protected $model = RestaurantDishes::class;

    public function definition(): array
    {
        return [
            'shown' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
