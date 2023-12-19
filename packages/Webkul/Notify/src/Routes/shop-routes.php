<?php

use Illuminate\Support\Facades\Route;
use Webkul\Notify\Http\Controllers\Shop\NotifyController;

Route::group(['middleware' => ['theme', 'locale', 'currency']], function () {
    Route::controller(NotifyController::class)->prefix('nofity')->group(function () {
        Route::post('/create', 'store')->name('shop.notify.store');
    });
});