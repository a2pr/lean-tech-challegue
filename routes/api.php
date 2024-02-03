<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\QuoteApiController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 
Route::post('/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        "device_name" => "required"
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name, ['*'], now()->addDay())->plainTextToken;
});

Route::get('/quotes', [QuoteApiController::class, 'index'])->name('quotes.api.index');
Route::get('/quotes/new', [QuoteApiController::class, 'new'])->name('quotes.api.new');

Route::middleware('auth:sanctum')->get('/secure-quotes', [QuoteApiController::class, 'secure'])
->name('quotes.api.secure');
Route::middleware('auth:sanctum')->post('/secure-quotes/new', [QuoteApiController::class, 'secureAdd'])
->name('quotes.api.secureAdd');

