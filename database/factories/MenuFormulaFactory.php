<?php

namespace Database\Factories;

use App\Models\MenuFormula;
use App\Models\RestaurantMenu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MenuFormulaFactory extends Factory
{
    protected $model = MenuFormula::class;

    public const NAMES = [
        'Formule complète',
        'Formule entrée + plat',
        'Formule entrée + plat + dessert',
        'Formule entrée + plat + dessert + boisson',
        'Formule entrée + plat + dessert + boisson + café',
        'Formule entrée + plat + dessert + café',
        'Formule enfant',
    ];

    public function definition(): array
    {
        return [
            'restaurant_menu_id' => RestaurantMenu::factory(),
            'name' => $this->faker->randomElement(self::NAMES),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
