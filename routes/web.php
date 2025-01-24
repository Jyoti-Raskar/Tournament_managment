<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamController;

Route::resource('tournaments', TournamentController::class);
Route::resource('teams', TeamController::class);
Route::get('/tournament/{id}/results', [TournamentController::class, 'results']);


Route::get('/tournaments/create', [TournamentController::class, 'create'])->name('tournaments.create');
Route::post('/tournaments', [TournamentController::class, 'store'])->name('tournaments.store');
Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('tournaments.show');


// Route for showing the edit form
Route::get('/tournaments/{id}/edit', [TournamentController::class, 'edit'])->name('tournaments.edit');

// Route for updating tournament data (PUT method)
Route::put('/tournaments/{id}', [TournamentController::class, 'update'])->name('tournaments.update');



Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');
