<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RestaurantDishesController;
use App\Models\Image;
use App\Models\RestaurantMenu;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::get('/', function () {
    return Inertia::render('HomePage', [
        'images' => Image::all(),
    ]);
})->name('home');

Route::get('/menus', function () {
    return Inertia::render('MenusPage', [
        'restaurantMenus' => RestaurantMenu::with('menuFormulas:id,restaurant_menu_id,name,description,price')->get(['id', 'title']),
    ]);
})->name('menus');

Route::get('/dishes', [RestaurantDishesController::class, 'showActive'])->name('dishes');

Route::post('/gallery/upload', [ImageController::class, 'store'])->name('gallery.upload');

Route::get('/booking', function () {
    return Inertia::render('BookingPage');
})->name('booking');
