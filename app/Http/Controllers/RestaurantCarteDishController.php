<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantCarteDishRequest;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\RestaurantCarte;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class RestaurantCarteDishController extends Controller
{
    public function create(RestaurantCarte $carte): Response
    {
        return Inertia::render('Admin/DishCreate', [
            'categories' => DishCategory::all(),
            'cartes' => RestaurantCarte::all(),
            'carte' => $carte
        ]);
    }

    public function store(RestaurantCarte $carte, CreateRestaurantCarteDishRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $dish = Dish::make([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        $dish->category()->associate(DishCategory::find($validated['category_id']));

        $carte->dishes()->save($dish);

        $dish->save();

        return to_route('cartes.edit', $carte->id);
    }
}
