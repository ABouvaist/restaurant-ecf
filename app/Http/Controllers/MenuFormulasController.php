<?php

namespace App\Http\Controllers;

use App\Models\MenuFormula;
use App\Models\RestaurantMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MenuFormulasController extends Controller
{
    public function index()
    {
        //TODO ?
    }

    public function create()
    {
        //TODO
    }

    public function store(Request $request)
    {
        //TODO
    }

    public function show(MenuFormula $menuFormula)
    {
        //TODO ?
    }

    public function edit(MenuFormula $menuFormula): Response
    {
        return Inertia::render('Admin/MenuFormula', [
            'formula' => $menuFormula->loadMissing('menu'),
            'menus' => RestaurantMenu::get(['id', 'title']),
        ]);
    }

    public function update(Request $request, MenuFormula $menuFormula)
    {
        //TODO
    }

    public function destroy(MenuFormula $menuFormula)
    {
        //TODO
    }
}
