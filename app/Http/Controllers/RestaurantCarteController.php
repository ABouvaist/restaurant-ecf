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
    public function index(): Response
    {
        return Inertia::render('Admin/CartesCategories', [
            'cartes' => RestaurantCarte::with('dishes', 'uniqueCategories')->get(),
            'categories' => DishCategory::all(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/RestaurantCarteCreate');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $restaurantCarte = RestaurantCarte::create($validated);

        return to_route('cartes.edit', $restaurantCarte->id);
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
        $validated = $request->validated();

        //do not redirect if only the shown attribute was updated
        if (count($validated) === 1 && $request->has('shown')) {
            $carte->toggleDisplay();
            return back();
        }

        $carte->update($validated);

        return to_route('cartes.index');
    }

    public function destroy(RestaurantCarte $carte): RedirectResponse
    {
        $carte->delete();

        return to_route('cartes.index');
    }

    public function showActive(): Response
    {
        $carte = RestaurantCarte::shown()
            ->with(['dishes.category', 'uniqueCategories'])
            ->first();

        $carteResource = new RestaurantDishesResource($carte);

        return Inertia::render('DishesPage', [
            'restaurantDishes' => $carteResource,
        ]);
    }
}
