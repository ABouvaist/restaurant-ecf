<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantCarteDishRequest;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\RestaurantCarte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RestaurantCarteDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO ?
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RestaurantCarte $carte): Response
    {
        return Inertia::render('Admin/DishCreate', [
            'categories' => DishCategory::all(),
            'cartes' => RestaurantCarte::all(),
            'carte' => $carte
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //TODO ?
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        //TODO ?
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        //TODO ?
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //TODO ?
    }
}
