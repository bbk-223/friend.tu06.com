<?php

use App\Models\User;
use App\Livewire\Chat\Chat;
use App\Livewire\Chat\Index;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MessageController;

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
Route::get('/profile/{id}', [MainController::class, 'profile'])->name('profile');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/settings/profile-information', [CustomAuthController::class, 'editProfile'])->name('user-profile-information.edit');
Route::get('/settings/password', [CustomAuthController::class, 'changePassword'])->name('user-password.edit');

Route::middleware('auth')->group(function (){

    Route::get('/chat',Index::class)->name('chat.index');
    Route::get('/chat/{query}',Chat::class)->name('chat');
    
    Route::get('/check-message/{userId}',[MessageController::class,'message'])->name('check-message');
    

});

