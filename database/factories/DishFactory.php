<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\RestaurantCarte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DishFactory extends Factory
{
    protected $model = Dish::class;

    public function definition(): array
    {
        return [
            'dish_category_id' => DishCategory::factory(),
            'restaurant_carte_id' => RestaurantCarte::factory(),
            'title' => $this->faker->foodName(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 20),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
