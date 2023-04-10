<?php

use App\Models\RestaurantMenu;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('HomePage');
})->name('home');

Route::get('/menus', function () {
    return Inertia::render('MenusPage', [
        'restaurantMenus' => RestaurantMenu::with('menuFormulas:id,restaurant_menu_id,name,description,price')->get(['id', 'title']),
    ]);
})->name('menus');

Route::get('/dishes', function () {
    return Inertia::render('DishesPage');
})->name('dishes');
