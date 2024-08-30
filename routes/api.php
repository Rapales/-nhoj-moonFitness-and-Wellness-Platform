<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutPlansController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/verify', [LoginController::class, 'verifyOtp']);

// Correct the update route to use PUT
Route::put('users/update/{id}', [UserController::class, 'update'])->name('Users.update');
Route::post('/store', [UserController::class, 'store'])->name('users.store');
Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/profile', [WorkoutPlansController::class, 'trainerWorkoutPlan']);
Route::get('/allUsers', [UserController::class, 'userAPI']);