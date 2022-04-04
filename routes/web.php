<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{GameController, WelcomeController};

Route::get('/', [ 'as' => 'welcome', 'uses' => WelcomeController::class, ]);
Route::get('/game', [ 'as' => 'game', 'uses' => GameController::class ]);
Route::post('/game', [GameController::class,'store'])->name('game.store');
