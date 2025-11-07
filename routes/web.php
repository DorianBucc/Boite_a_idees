<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'welcome'])->name('home');



Route::get('/inscription', [AuthController::class, 'showRegisterForm'])->name('register'); // Traite les données du formulaire
Route::post('/inscription', [AuthController::class, 'register']);

Route::get('/connexion', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/connexion', [AuthController::class, 'login']); // Déconnexion
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [IdeaController::class, 'index'])->name('dashboard');
    Route::resource('idea', IdeaController::class);
});
