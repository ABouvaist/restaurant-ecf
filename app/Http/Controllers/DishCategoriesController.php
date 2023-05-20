<?php

namespace App\Http\Controllers;

use App\Models\DishCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DishCategoriesController extends Controller
{
    public function index()
    {
        //TODO ?
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Category/CategoryCreate');
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|string',
        ];

        $validated = $request->validate($rules);

        DishCategory::create($validated);

        return to_route('cartes.index');
    }

    public function show(DishCategory $dishCategory)
    {
        //TODO ?
    }

    public function edit(DishCategory $dishCategory)
    {
        //TODO
    }

    public function update(Request $request, DishCategory $dishCategory)
    {
        //TODO
    }

    public function destroy(DishCategory $dishCategory)
    {
        //TODO
    }
}
