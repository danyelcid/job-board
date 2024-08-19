<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OpeningApplicationController;
use App\Http\Controllers\OpeningController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('openings.index'));

Route::resource('openings', OpeningController::class)
    ->only('index','show');

Route::get('login', fn () => to_route('auth.create'));
Route::resource('auth', AuthController::class)
    ->only('create','store');

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('opening.application', OpeningApplicationController::class)
        ->only('create','store');
});
