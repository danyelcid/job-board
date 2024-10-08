<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MyOpeningApplicationsController;
use App\Http\Controllers\MyOpeningController;
use App\Http\Controllers\OpeningApplicationController;
use App\Http\Controllers\OpeningController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('openings.index'));

Route::resource('openings', OpeningController::class)
    ->only('index','show');

Route::get('login', fn () => to_route('auth.create'))
    ->name('login');
Route::resource('auth', AuthController::class)
    ->only('create','store');

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('opening.application', OpeningApplicationController::class)
        ->only('create','store');

    Route::resource('my_opening_applications', MyOpeningApplicationsController::class)
        ->only('index','destroy');

    Route::resource('employer', EmployerController::class)
        ->only('create','store');

    Route::middleware('employer')
        ->resource('my_openings', MyOpeningController::class);

});
