<?php

use App\Http\Controllers\OpeningController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('openings.index'));

Route::resource('openings', OpeningController::class)
    ->only('index','show');

