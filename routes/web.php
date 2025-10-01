<?php

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

//Route::view('/', 'welcome');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');
    Route::view('files/create', 'files.create')
        ->name('files.create');
    Route::view('files', 'files.show')
        ->name('files.show');
    Route::view('leads', 'leads.index')
        ->name('leads.index');
    Route::view('leads/disparar', 'leads.fire-leads')
        ->name('leads.fire');
    Route::view('imagens', 'images.index')
        ->name('images.index');
    Route::view('imagens/novo', 'images.create')
        ->name('images.create');
});

require __DIR__ . '/auth.php';
