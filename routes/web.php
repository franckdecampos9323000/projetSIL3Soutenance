<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\ComptesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DetailsAnnonceController;
use App\Http\Controllers\GestionAnnonceController;
use App\Http\Controllers\GestionUtilisateurController;
use App\Http\Controllers\GestionAnnonceUtilisateurController;

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
    return view('pages.accueil');
});

Route::resource('Accueil', AccueilController::class);
Route::resource('Apropos', AproposController::class);
Route::resource('Contacts', ContactController::class);


// Route pour afficher la liste des annonces approuvées
Route::get('/annonces', [AnnoncesController::class, 'index'])->name('Annonces.index');

// Route pour afficher les détails d'une annonce approuvée
Route::get('/annonces/{id}', [AnnoncesController::class, 'show'])->name('annonces.show');

Route::resource('Comptes', ComptesController::class);

// Routes pour l'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes pour la connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes accessibles par les utilisateurs
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::resource('user-annonces', GestionAnnonceUtilisateurController::class);

    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile.show');
    Route::get('/user/profile/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile', [UserProfileController::class, 'update'])->name('user.profile.update');

        // Afficher le contenu du panier
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');

        // Ajouter un article au panier
    Route::post('/panier', [PanierController::class, 'store'])->name('panier.store');

    Route::put('/panier/{id}', [PanierController::class, 'update'])->name('panier.update');

        // Supprimer un article du panier
    Route::delete('/panier/{id}', [PanierController::class, 'destroy'])->name('panier.supprimer');
});

// Routes accessibles par les administrateurs
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('gestion-utilisateurs', GestionUtilisateurController::class);
    Route::put('gestion-utilisateurs/{id}/approve', [GestionUtilisateurController::class, 'approve'])->name('gestion-utilisateurs.approve');
    Route::put('gestion-utilisateurs/{id}/disapprove', [GestionUtilisateurController::class, 'disapprove'])->name('gestion-utilisateurs.disapprove');
    Route::resource('gestion-annonces', GestionAnnonceController::class);
    Route::post('gestion-annonces/{id}/approve', [GestionAnnonceController::class, 'approve'])->name('gestion-annonces.approve');
    Route::post('gestion-annonces/{id}/disapprove', [GestionAnnonceController::class, 'disapprove'])->name('gestion-annonces.disapprove');

    Route::get('/admin/profile', [AdminProfileController::class, 'show'])->name('admin.profile.show');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});
