<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\Image;
use App\Models\RestaurantDishes;
use App\Models\RestaurantMenu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        RestaurantMenu::factory()
            ->count(10)
            ->hasMenuFormulas(3)
            ->create();

        $categories = DishCategory::factory()
            ->count(5)
            ->create();

        $restaurantDish = RestaurantDishes::factory(1)
            ->active()
            ->create();


        $categories->each(function ($category) use ($restaurantDish) {
            Dish::factory()
                ->count(5)
                ->for($category)
                ->for($restaurantDish->first())
                ->create();
        });

        Image::factory(10)->create();
    }
}
