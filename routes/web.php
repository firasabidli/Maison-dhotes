<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaisonListController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;

// Page de connexion (guest uniquement)
Route::middleware('guest')->get('/',[HomeController::class, 'index'])->name('client.home');

// Accès PUBLIC : sans authentification
Route::get('/home', [HomeController::class, 'index'])->name('client.home');
Route::get('/maison/detail/{id}', [MaisonController::class, 'detail'])->name('maison.detail');
Route::get('/maison-list', [MaisonListController::class, 'maisonList'])->name('maisonList.maisonList');

// Mot de passe oublié (personnalisé)
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.forgot');

Route::post('/mot-de-passe-oublie/email', [ForgotPasswordController::class, 'step1'])->name('forgot.step1');
Route::post('/mot-de-passe-oublie/code', [ForgotPasswordController::class, 'step2'])->name('forgot.step2');
Route::post('/mot-de-passe-oublie/reset', [ForgotPasswordController::class, 'step3'])->name('forgot.step3');

// Routes Authentifiées (clients)
Route::middleware('auth')->group(function () {
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/suivre-demande', [ReservationController::class, 'suivieDemande'])->name('reservation.suivieDemande');
    Route::put('/reservation/suivre-demande/{id}', [ReservationController::class, 'updateRes'])->name('reservation.updateRes');

    Route::post('/avis', [AvisController::class, 'store'])->name('avis.store');

    Route::get('/profil', [ProfilController::class, 'settings'])->name('profil.settings');
    Route::put('/profil/modifier-profil/{id}', [ProfilController::class, 'updateProfile'])->name('profil.updateProfile');
    Route::put('/profil/change-password/{id}', [ProfilController::class, 'changePassword'])->name('profil.changePassword');

    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
});

// Routes pour ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Gestion catégories
    Route::get('/admin/categories', [AdminController::class, 'categoryIndex'])->name('admin.categoryIndex');
    Route::post('/admin/categories', [AdminController::class, 'categoryStore'])->name('admin.categoryStore');
    Route::put('/admin/categories/{id}', [AdminController::class, 'categoryUpdate'])->name('admin.categoryUpdate');
    Route::delete('/admin/categories/{id}', [AdminController::class, 'categoryDestroy'])->name('admin.categoryDestroy');

    // Gestion maisons
    Route::get('/admin/maisons', [AdminController::class, 'maisonsIndex'])->name('admin.maisonsIndex');
    Route::post('/admin/maisons', [AdminController::class, 'maisonsStore'])->name('admin.maisonsStore');
    Route::put('/admin/maisons/{id}', [AdminController::class, 'maisonsUpdate'])->name('admin.maisonsUpdate');
    Route::delete('/admin/maisons/{id}', [AdminController::class, 'maisonsDestroy'])->name('admin.maisonsDestroy');

    // Gestion avis
    Route::get('/admin/avis', [AdminController::class, 'avisIndex'])->name('admin.avisIndex');
    Route::delete('/admin/avis/{id}', [AdminController::class, 'avisDestroy'])->name('admin.avisDestroy');

    // Gestion utilisateurs
    Route::get('/admin/gestion-utilisateurs', [AdminController::class, 'usersIndex'])->name('admin.usersIndex');
    Route::post('/admin/gestion-utilisateurs', [AdminController::class, 'addUser'])->name('admin.addUser');
    Route::put('/admin/gestion-utilisateurs/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::delete('/admin/gestion-utilisateurs/{id}', [AdminController::class, 'userDestroy'])->name('admin.userDestroy');
});

// Routes pour PROPRIÉTAIRE
Route::middleware(['auth', 'role:propriétaire'])->group(function () {
    Route::get('/proprietaire/dashboard', [ProprietaireController::class, 'dashboard'])->name('proprietaire.dashboard');

    // Gestion catégories
    Route::get('/proprietaire/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/proprietaire/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/proprietaire/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/proprietaire/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Gestion maisons
    Route::get('/proprietaire/maisons', [MaisonController::class, 'index'])->name('maisons.index');
    Route::post('/proprietaire/maisons', [MaisonController::class, 'store'])->name('maisons.store');
    Route::put('/proprietaire/maisons/{id}', [MaisonController::class, 'update'])->name('maisons.update');
    Route::delete('/proprietaire/maisons/{id}', [MaisonController::class, 'destroy'])->name('maisons.destroy');

    // Gestion réservations
    Route::get('/proprietaire/gestion-reservation', [ReservationController::class, 'reservationsMaisons'])->name('reservation.reservationsMaisons');
    Route::put('/reservation/gestion-reservation/{id}', [ReservationController::class, 'gestionReservation'])->name('reservation.gestionReservation');
    Route::put('/reservation/gestion-reservation/paiement/{id}', [ReservationController::class, 'paiement'])->name('reservation.paiement');
    Route::delete('/proprietaire/gestion-reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

    // Avis
    Route::get('/proprietaire/avis', [AvisController::class, 'index'])->name('avis.index');
    Route::delete('/proprietaire/avis/{id}', [AvisController::class, 'destroy'])->name('avis.destroy');
});

// Auth routes (standard Laravel Breeze / Jetstream / Fortify)
require __DIR__.'/auth.php';
