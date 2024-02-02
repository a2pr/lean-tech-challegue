<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\TodayController;
use App\Http\Controllers\UserFavoriteQuoteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function () {
    return redirect()->route('today.index');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/today', [TodayController::class, 'index'])->name('today.index');

Route::get('/today/new', [TodayController::class, 'new'])->name('today.new');

Route::get('/favorite/add/{id}', [UserFavoriteQuoteController::class, 'store'])
->middleware(['auth', 'verified'])->name('favorite.add');

Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
Route::get('/quotes/new', [QuoteController::class, 'new'])->name('quotes.new');


Route::get('/secure-quotes', [QuoteController::class, 'secure'])
->middleware(['auth', 'verified'])->name('quotes.secure');

Route::get('/secure-quotes/new', [QuoteController::class, 'secureAdd'])
->middleware(['auth', 'verified'])->name('quotes.secure_add');


require __DIR__.'/auth.php';
