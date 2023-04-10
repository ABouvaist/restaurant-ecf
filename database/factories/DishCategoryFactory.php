<?php

namespace Database\Factories;

use App\Models\DishCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DishCategoryFactory extends Factory
{
    protected $model = DishCategory::class;

    public const CATEGORIES = [
        'Pizza',
        'Pasta',
        'Salads',
        'Desserts',
        'Drinks',
    ];
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(self::CATEGORIES),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
