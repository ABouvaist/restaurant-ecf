<?php

namespace Database\Factories;

use App\Models\RestaurantMenu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RestaurantMenuFactory extends Factory
{
    public const MENU_TITLES = [
        'Lunch Specials',
        'Dinner Specials',
        'Happy Hour Specials',
        'Dessert Menu',
        'Beverage Menu',
        'Kids Menu',
        'Specialty Drinks',
        'Wine List',
        'Beer List',
        'Cocktail List',
        'Appetizer Menu',
        'Entree Menu',
        'Pizza Menu',
        'Burger Menu',
        'Sandwich Menu',
        'Sushi Menu',
        'Sashimi Menu',
        'Roll Menu',
        'Dessert Menu',
        'Kids Menu',
        'Beverage Menu',
        'Drinks Menu',
        'Beer Menu',
        'Wine Menu',
        'Cocktail Menu',
        'Specialty Drinks',
        'Appetizer Menu',
        'Entree Menu',
        'Pizza Menu',
        'Burger Menu',
        'Sandwich Menu',
        'Sushi Menu',
        'Sashimi Menu',
        'Roll Menu',
        'Dessert Menu',
        'Kids Menu',
        'Beverage Menu',
        'Drinks Menu',
        'Beer Menu',
        'Wine Menu',
        'Cocktail Menu',
        'Specialty Drinks',
        'Appetizer Menu',
        'Entree Menu',
        'Pizza Menu',
        'Burger Menu',
        'Sandwich Menu',
        'Sushi Menu',
        'Sashimi Menu',
        'Roll Menu',
        'Dessert Menu',
        'Kids Menu',
        'Beverage Menu',
        'Drinks Menu',
        'Beer Menu',
        'Wine Menu',
        'Cocktail Menu',
        'Specialty Drinks',
        'Appetizer Menu',
        'Entree Menu',
        'Pizza Menu',
        'Burger Menu',
        'Sandwich Menu',
        'Sushi Menu',
        'Sashimi Menu',
        'Roll Menu',
        'Dessert Menu',
        'Kids Menu',
        'Beverage Menu',
        'Drinks Menu',
        'Beer Menu',
        'Wine Menu',
        'Cocktail Menu',
        'Specialty Drinks',
        'Appetizer Menu',
        'Entree Menu',
        'Pizza Menu',
        'Burger Menu',
        'Sandwich Menu',
        'Sushi Menu',
        'Sashimi Menu',
        'Roll Menu',
    ];

    protected $model = RestaurantMenu::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(self::MENU_TITLES),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
