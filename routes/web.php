<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'main'])->name('main');
Route::post('search/', [MainController::class, 'search'])->name('search');
Route::get('/profile/{id}', [MainController::class, 'profile']);

Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/settings/profile-information', [CustomAuthController::class, 'editProfile'])->name('user-profile-information.edit');
Route::get('/settings/password', [CustomAuthController::class, 'changePassword'])->name('user-password.edit');

