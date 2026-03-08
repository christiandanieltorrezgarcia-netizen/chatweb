<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('chat')
        : redirect()->route('login');
});

Route::get('/chat/poll', [MessageController::class, 'poll'])->middleware('auth');

Route::get('/chat', [MessageController::class, 'index'])->middleware('auth')->name('chat');
Route::post('/chat', [MessageController::class, 'store'])->middleware('auth');

Route::get('/dashboard', function () {
    return redirect()->route('chat');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/password/change', [App\Http\Controllers\Auth\ChangePasswordController::class, 'show'])
    ->name('password.change');
    Route::post('/password/change', [App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])
        ->name('password.change.post');
});

Route::get('/first-login', [App\Http\Controllers\Auth\FirstLoginController::class, 'show'])
    ->name('first.login')
    ->middleware('guest');

Route::post('/first-login', [App\Http\Controllers\Auth\FirstLoginController::class, 'store'])
    ->name('first.login.post')
    ->middleware('guest');

require __DIR__.'/auth.php';
