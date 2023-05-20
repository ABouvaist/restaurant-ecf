<?php

namespace App\Http\Controllers;

use App\Models\MenuFormula;
use App\Models\RestaurantMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MenuFormulasController extends Controller
{
    public function index()
    {
        //TODO ?
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Menu/MenuFormulaCreate', [
            'menus' => RestaurantMenu::get(['id', 'title']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'restaurant_menu_id' => 'required|exists:restaurant_menus,id',
        ];

        $validated = $request->validate($rules);

        $menuFormula = MenuFormula::make([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        $menuFormula->menu()->associate($validated['restaurant_menu_id'])->save();

        return to_route('menus.edit', $menuFormula->menu->id);
    }

    public function show(MenuFormula $menuFormula)
    {
        //TODO ?
    }

    public function edit(MenuFormula $menuFormula): Response
    {
        return Inertia::render('Admin/Menu/MenuFormulaEdit', [
            'formula' => $menuFormula->loadMissing('menu'),
            'menus' => RestaurantMenu::get(['id', 'title']),
        ]);
    }

    public function update(Request $request, MenuFormula $menuFormula): RedirectResponse
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'restaurant_menu_id' => 'required|exists:restaurant_menus,id',
        ];

        $validated = $request->validate($rules);

        $menuFormula->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        $menuFormula->menu()->associate($validated['restaurant_menu_id'])->save();

        return to_route('menus.edit', $menuFormula->menu->id);
    }

    public function destroy(MenuFormula $menuFormula): RedirectResponse
    {
        $menuFormula->delete();

        return to_route('menus.edit', $menuFormula->menu->id);
    }
}
