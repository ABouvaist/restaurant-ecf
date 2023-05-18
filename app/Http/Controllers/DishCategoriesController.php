<?php

namespace App\Http\Controllers;

use App\Models\DishCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DishCategoriesController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return Inertia::render('Admin/CategoryCreate');
    }

    public function store(Request $request)
    {
        //Define the validation rules
        $rules = [
            'name' => 'required|string',
        ];

        //Validate the request
        $validated = $request->validate($rules);

        //Create the dish category
        $dishCategory = DishCategory::create($validated);

        //Redirect to the cartes index page
        return redirect()->route('cartes.index');
    }

    public function show(DishCategory $dishCategory)
    {
    }

    public function edit(DishCategory $dishCategory)
    {
    }

    public function update(Request $request, DishCategory $dishCategory)
    {
    }

    public function destroy(DishCategory $dishCategory)
    {
    }
}
