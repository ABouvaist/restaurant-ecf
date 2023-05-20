<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DishCategoriesController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenuFormulasController;
use App\Http\Controllers\OpeningHoursController;
use App\Http\Controllers\RestaurantCarteController;
use App\Http\Controllers\RestaurantCarteDishController;
use App\Http\Controllers\RestaurantMenusController;
use App\Http\Controllers\UpdateUserSettingsController;
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

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');


    Route::resource('images', ImageController::class)->except(['show']);
    Route::resource('cartes', RestaurantCarteController::class);
    Route::resource('cartes.dishes', RestaurantCarteDishController::class)->scoped([
        'cartes' => 'carte:id',
        'dishes' => 'dish:id',
    ])->only(['create', 'store']);
    Route::resource('dishes', DishesController::class)->except(['index', 'show', 'store']);

    Route::resource('categories', DishCategoriesController::class)->except(['index', 'show']);

    Route::resource('menus', RestaurantMenusController::class)->except(['show']);

    Route::resource('formulas', MenuFormulasController::class)->except(['index', 'show']);

    Route::resource('hours', OpeningHoursController::class)->only(['index', 'update']);
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

Route::get('/dishes', [RestaurantCarteController::class, 'showActive'])->name('dishes');

Route::get('/booking', function () {
    return Inertia::render('BookingPage');
})->name('booking');


Route::get('/hours', function () {
    return Inertia::render('OpeningHoursPage');
})->name('hours');


Route::get('/account', function () {
    return Inertia::render('AccountPage', [
        'user' => auth()->user()->only(['first_name', 'last_name', 'email']),
        'settings' => auth()->user()->settings->only(['number_of_guests', 'allergies']),
    ]);
})->name('account');

Route::put('/account', UpdateUserSettingsController::class)->name('account.update');
