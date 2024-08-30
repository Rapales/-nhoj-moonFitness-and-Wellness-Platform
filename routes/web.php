<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\WorkoutPlansController;
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
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
});

Route::get('/login', [LoginController::class, 'loginForm']);
Route::get('/home', [LoginController::class, 'home'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
Route::get('/progress/create', [ProgressController::class, 'create'])->name('progress.create');

Route::resource('trainers', TrainerController::class);

Route::resource('members', MembersController::class);