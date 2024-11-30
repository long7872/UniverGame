<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/index');
});

// Home page start
Route::get('/index', [HomeController::class, 'index'])->name('index');

// Route::get('/index/update', [HomeController::class, 'update']);

Route::get('/play/{id}', [GameController::class, 'index'])->name('play');

Route::get('/games/filter/{category}', [GameController::class, 'filterByCategory'])->name('games.filter');
Route::get('/games/pagination/{category}/{page}', [GameController::class, 'paging'])->name('games.page');

// Home page end

Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/details', function () {
    return view('product_details');
})->name('details');
