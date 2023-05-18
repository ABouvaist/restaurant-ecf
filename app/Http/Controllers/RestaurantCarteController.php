<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantCarteRequest;
use App\Http\Resources\RestaurantDishesResource;
use App\Models\DishCategory;
use App\Models\RestaurantCarte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RestaurantCarteController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/CartesCategories', [
            'cartes' => RestaurantCarte::with('dishes', 'uniqueCategories')->get(),
            'categories' => DishCategory::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/RestaurantCarteCreate');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate the request
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        //create the restaurant dish
        $restaurantCarte = RestaurantCarte::create($validated);

        //redirect to the edit route
        return redirect()->route('cartes.edit', $restaurantCarte->id);
    }

    public function show(RestaurantCarte $carte): Response
    {
        return Inertia::render('Admin/RestaurantDish', [
            'carte' => $carte->load('dishes', 'uniqueCategories')
        ]);
    }

    public function edit(RestaurantCarte $carte): Response
    {
        return Inertia::render('Admin/RestaurantDish', [
            'carte' => $carte->load('dishes', 'uniqueCategories')
        ]);
    }

    public function update(RestaurantCarteRequest $request, RestaurantCarte $carte): RedirectResponse
    {
        //validate the request
        $validated = $request->validated();

        //do not redirect if only the shown attribute was updated
        if (count($validated) === 1 && $request->has('shown')) {
            $carte->toggleDisplay();
            return back();
        }

        //update the restaurant dishes
        $carte->update($validated);

        //redirect to the edit route
        return redirect()->route('cartes.edit', $carte->id);
    }

    public function destroy(RestaurantCarte $restaurantDishes)
    {
    }

    public function showActive()
    {
        $activeRestaurantDishes = RestaurantCarte::where('shown', true)->first();
        $activeRestaurantDishes->load('dishes', 'uniqueCategories');
        $activeRestaurantDishes->dishes->load('category');
        $resource = new RestaurantDishesResource($activeRestaurantDishes);

        return Inertia::render('DishesPage', [
            'restaurantDishes' => $resource,
        ]);
    }
}
