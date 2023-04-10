<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\RestaurantDishes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DishFactory extends Factory
{
    protected $model = Dish::class;

    public function definition(): array
    {
        return [
            'dish_category_id' => DishCategory::factory(),
            'restaurant_dish_id' => RestaurantDishes::factory(),
            'title' => $this->faker->foodName(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 20),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
