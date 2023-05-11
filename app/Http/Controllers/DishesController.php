<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\RestaurantCarte;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DishesController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return Inertia::render('Admin/DishCreate', [
            'categories' => DishCategory::all(),
            'cartes' => RestaurantCarte::all(),
        ]);
    }

    public function store(Request $request)
    {
    }

    public function show(Dish $dish)
    {
    }

    public function edit(Dish $dish)
    {
        return Inertia::render('Admin/Dish', [
            'dish' => $dish,
            'categories' => $dish->carte->uniqueCategories,
            'cartes' => RestaurantCarte::all(),
        ]);
    }

    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //validate the request
        $validated = $request->validated();

        //update the dish
        $dish->update($validated);

        //update the restaurantDish relationship
        $dish->carte()->associate($validated['restaurant_dish_id'])->save();

        //update the dishCategory relationship
        $dish->dishCategory()->associate($validated['dish_category_id'])->save();

        //redirect to the edit route
        return redirect()->route('dishes.edit', $dish->id);
    }

    public function destroy(Dish $dish)
    {
    }
}
