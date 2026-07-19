<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingController;

Route::middleware(['web', 'auth', 'permission:settings.manage'])->group(function () {
    Route::get('/system/settings', [SettingController::class, 'edit'])->name('system.settings');
    Route::put('/system/settings', [SettingController::class, 'update'])->name('system.settings.update');
});
