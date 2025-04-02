<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProprietaireController;

Route::middleware('guest')->get('/', function () {
    return view('auth.login');
});


Route::get('/home', function () {
    return view('client.home');
})->middleware(['auth', 'verified'])->name('client.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/page2', [AdminController::class, 'page2'])->name('admin.page2');
});

Route::middleware(['auth', 'role:propriétaire'])->group(function(){
    Route::get('/proprietaire/dashboard', [ProprietaireController::class, 'dashboard'])->name('proprietaire.dashboard');
    Route::get('/proprietaire/page2', [ProprietaireController::class, 'page2'])->name('proprietaire.page2');
});

require __DIR__.'/auth.php';
