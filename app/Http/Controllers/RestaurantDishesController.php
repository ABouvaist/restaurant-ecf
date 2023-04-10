<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantDishesResource;
use App\Models\RestaurantDishes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RestaurantDishesController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(RestaurantDishes $restaurantDishes)
    {
    }

    public function edit(RestaurantDishes $restaurantDishes)
    {
    }

    public function update(Request $request, RestaurantDishes $restaurantDishes)
    {
    }

    public function destroy(RestaurantDishes $restaurantDishes)
    {
    }

    public function showActive()
    {
        $activeRestaurantDishes = RestaurantDishes::where('shown', true)->first();
        $activeRestaurantDishes->load('dishes', 'uniqueCategories');
        $activeRestaurantDishes->dishes->load('category');
        $resource = new RestaurantDishesResource($activeRestaurantDishes);

        return Inertia::render('DishesPage', [
            'restaurantDishes' => $resource,
        ]);
    }
}
