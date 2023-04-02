<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('projects', ProjectController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Rate limiting
    $key = $request->ip();
    $maxAttempts = 5;
    $decaySeconds = 60;
    if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
        return response()->json(['error' => 'Too many login attempts. Please try again ' . $decaySeconds / 60 . ' minute(s) later'], 429);
    }
    RateLimiter::hit($key, $decaySeconds);

    if (Auth::attempt($credentials)) {
        $token = $request->user()->createToken('auth-token')->plainTextToken;
        return response()->json(['token' => $token], 200);
    } else {
        return response()->json(['email' => 'The provided credentials are incorrect.'], 403);
    }
});
