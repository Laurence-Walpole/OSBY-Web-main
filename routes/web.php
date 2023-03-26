<?php

use App\Http\Controllers\HighscoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/vote', [HomeController::class, 'vote'])->name('vote');
Route::get('/highscores', [HomeController::class, 'highscores'])->name('highscores');
Route::get('/highscores/{player_id}', [HomeController::class, 'individualHighscores'])->name('highscores-individual');
Route::get('/highscores/skill/{skill_name}', [HomeController::class, 'skillHighscores'])->name('highscores-skills');
Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
Route::get('/play', [HomeController::class, 'play'])->name('play');
Route::get('/discord', [HomeController::class, 'discord'])->name('discord');

//Basic API routes
    //Player Count
Route::post('/players/update/i', [PlayerController::class, 'increment'])->name('players-update-increment');
Route::post('/players/update/d', [PlayerController::class, 'decrement'])->name('players-update-decrement');
Route::post('/players/update/r', [PlayerController::class, 'reset'])->name('players-update-reset');
Route::get('/players/count', [PlayerController::class, 'get'])->name('player-count');

    //Highscores
Route::post('/players/highscores/update', [HighscoresController::class, 'addOrUpdatePlayer'])->name('hs-update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
