<?php

namespace App\Http\Controllers;

use App\Models\RestaurantMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RestaurantMenusController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Menu/MenuList', [
            'menus' => RestaurantMenu::with('menuFormulas:id,restaurant_menu_id,name,description,price')->get(['id', 'title']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Menu/MenuCreate');
    }

    public function store(Request $request): RedirectResponse
    {
        ["title" => $title] = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        RestaurantMenu::create([
            'title' => $title,
        ]);

        return to_route('menus.index');
    }


    public function edit(RestaurantMenu $restaurantMenu): Response
    {
        return Inertia::render('Admin/Menu/MenuEdit', [
            'menu' => $restaurantMenu->load('menuFormulas:id,restaurant_menu_id,name,description,price'),
        ]);
    }

    public function update(Request $request, RestaurantMenu $restaurantMenu): RedirectResponse
    {
        ["title" => $title] = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $restaurantMenu->update([
            'title' => $title,
        ]);

        return to_route('menus.index');
    }

    public function destroy(RestaurantMenu $restaurantMenu): RedirectResponse
    {
        $restaurantMenu->delete();

        return to_route('menus.index');
    }
}
