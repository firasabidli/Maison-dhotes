<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaisonListController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AvisController;
Route::middleware('guest')->get('/', function () {
    return view('auth.login');
});


Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('client.home');


Route::middleware('auth')->group(function () {
    
    Route::get('/maison/detail/{id}', [MaisonController::class, 'detail'])->name('maison.detail');
    Route::get('/maison-list', [MaisonListController::class, 'maisonList'])->name('maisonList.maisonList');
    
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/suivre-demande', [ReservationController::class, 'suivieDemande'])->name('reservation.suivieDemande');
    Route::put('/reservation/suivre-demande/{id}', [ReservationController::class, 'updateRes'])->name('reservation.updateRes');

    Route::post('/avis', [AvisController::class, 'store'])->name('avis.store');

});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/page2', [AdminController::class, 'page2'])->name('admin.page2');
});

Route::middleware(['auth', 'role:propriétaire'])->group(function(){
    Route::get('/proprietaire/dashboard', [ProprietaireController::class, 'dashboard'])->name('proprietaire.dashboard');
    
    // Routes CRUD Catégories

    Route::get('/proprietaire/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/proprietaire/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/proprietaire/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/proprietaire/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    // Routes CRUD maisons

    Route::get('/proprietaire/maisons', [MaisonController::class, 'index'])->name('maisons.index');
    Route::post('/proprietaire/maisons', [MaisonController::class, 'store'])->name('maisons.store');
    Route::put('/proprietaire/maisons/{id}', [MaisonController::class, 'update'])->name('maisons.update');
    Route::delete('/proprietaire/maisons/{id}', [MaisonController::class, 'destroy'])->name('maisons.destroy');
    
    // Routes gestion reservation
    Route::get('/proprietaire/gestion-reservation', [ReservationController::class, 'reservationsMaisons'])->name('reservation.reservationsMaisons');
    Route::put('/reservation/gestion-reservation/{id}', [ReservationController::class, 'gestionReservation'])->name('reservation.gestionReservation');
    Route::put('/reservation/gestion-reservation/paiement/{id}', [ReservationController::class, 'paiement'])->name('reservation.paiement');
    Route::delete('/proprietaire/gestion-reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    
    // Routes contrôle Avis
    Route::get('/proprietaire/avis', [AvisController::class, 'index'])->name('avis.index');
    Route::delete('/proprietaire/avis/{id}', [AvisController::class, 'destroy'])->name('avis.destroy');



});

require __DIR__.'/auth.php';
