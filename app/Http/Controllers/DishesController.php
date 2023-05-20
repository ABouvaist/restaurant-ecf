<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\RestaurantCarte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DishesController extends Controller
{

    public function create(): Response
    {
        return Inertia::render('Admin/DishCreate', [
            'categories' => DishCategory::all(),
            'cartes' => RestaurantCarte::all(),
        ]);
    }

    public function edit(Dish $dish): Response
    {
        return Inertia::render('Admin/Dish', [
            'dish' => $dish,
            'categories' => DishCategory::all(),
            'cartes' => RestaurantCarte::all(),
        ]);
    }

    public function update(UpdateDishRequest $request, Dish $dish): RedirectResponse
    {
        $validated = $request->validated();

        $dish->update($validated);

        $dish->carte()->associate($validated['restaurant_carte_id'])->save();

        $dish->dishCategory()->associate($validated['dish_category_id'])->save();

        return to_route('cartes.edit', $dish->carte->id);
    }

    public function destroy(Dish $dish): RedirectResponse
    {
        $dish->delete();

        return to_route('cartes.edit', $dish->carte->id);
    }
}
