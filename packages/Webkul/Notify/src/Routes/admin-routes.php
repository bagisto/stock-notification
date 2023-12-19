<?php

use Illuminate\Support\Facades\Route;
use Webkul\Notify\Http\Controllers\Admin\NotifyController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url')], function () {
    Route::get('/notify', [NotifyController::class, 'index'])->name('notify.admin.index');

    Route::post('/notify/store', [NotifyController::class, 'store'])->name('notify.admin.store');

    Route::post('/notify/update-stock-status', [NotifyController::class, 'updateStockStatus'])->name('notify.admin.updateStockStatus');
});