<?php

use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Concept Routes
    Route::get('/concept', [ConceptController::class , 'index'])->name('concept.index');
    Route::get('/concept/create', [ConceptController::class , 'create'])->name('concept.create');
    Route::post('/concept', [ConceptController::class , 'store'])->name('concept.store');
    Route::get('/concept/{concept}/show', [ConceptController::class , 'show'])->name('concept.show');
    Route::get('/concept/{concept}/edit', [ConceptController::class , 'edit'])->name('concept.edit');
    Route::put('/concept/{concept}/update', [ConceptController::class , 'update'])->name('concept.update');
    Route::delete('/concept/{concept}/destroy', [ConceptController::class, 'destroy'])->name('concept.destroy');
});

require __DIR__.'/auth.php';
