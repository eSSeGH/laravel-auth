<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

// se si sscrivono dei middleware o dei metodi prima della funz group vengono applicati a tutto il gruppo
// in uestpo caso le 3 rotte sarebbero profile.edit , profile.update, profile. destroy
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // rotta aggiuntiva della risorsa per gestire soft_delete (aggiungere sempre prima le rotte aggiuntive)
    Route::post('/projects/{project:slug}/restore', [ProjectController::class, 'restore'])->name('projects.restore')->withTrashed();

    // Resource route di project
    Route::resource('projects', ProjectController::class)->parameters([
        'projects' => 'project:slug'
    ])->withTrashed(['show','edit','update','destroy']);
});

require __DIR__.'/auth.php';
