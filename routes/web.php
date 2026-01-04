<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::post('/reservations', [ReservationController::class, 'store'])
    ->name('reservations.store');

Route::post('/reservations/{id}/approve', [ReservationController::class, 'approve'])
    ->name('reservations.approve');

Route::get('/test-all-roles', function () {
    return 'Routes working';
});
