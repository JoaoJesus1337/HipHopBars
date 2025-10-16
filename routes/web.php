<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\ArtistController;

Route::get('/', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
