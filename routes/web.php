<?php

use App\Http\Controllers\AuthController;
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


Route::prefix('games')->name('games.')->group(function () {
    Route::get('/{id}', [GameController::class, 'index'])->name('play');

    Route::get('/filter/{category}', [GameController::class, 'filterByCategory'])->name('filter');
    Route::get('/pagination/{category}/{page}', [GameController::class, 'paging'])->name('page');

    Route::get('/update', [GameController::class, 'update']);
});
// Home page end

// Auth start
Route::prefix('auth')->name('auth.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginPost')->name('login.post');
        Route::post('/register', 'registerPost')->name('register.post');
        Route::post('/logout', 'logout')->name('logout');
        // GoogleAuth
        Route::get('redirection/{provider}', 'authProviderRedirect')->name('redirection');
        Route::get('{provider}/call-back', 'socialAuthenticate')->name('callback');
    });
});
// Auth end

// Privilege start
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     // Các route admin khác
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
// });
// Privilege end


// Route::get('/shop', function () {
//     return view('shop');
// })->name('shop');
// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');
Route::get('/games', function () {
    return view('games');
})->name('games');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');
