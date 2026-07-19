<?php

use Illuminate\Support\Facades\Route;
use Modules\IAM\Http\Controllers\AdministrationController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/administration/{section}', [AdministrationController::class, 'index'])->whereIn('section', ['users', 'roles', 'permissions'])->name('administration.index');
    Route::get('/administration/{section}/create', [AdministrationController::class, 'create'])->whereIn('section', ['users', 'roles', 'permissions'])->name('administration.create');
    Route::post('/administration/{section}', [AdministrationController::class, 'store'])->whereIn('section', ['users', 'roles', 'permissions'])->name('administration.store');
    Route::get('/administration/{section}/{id}', [AdministrationController::class, 'show'])->whereIn('section', ['users', 'roles', 'permissions'])->name('administration.show');
    Route::delete('/administration/{section}/{id}', [AdministrationController::class, 'destroy'])->whereIn('section', ['users', 'roles', 'permissions'])->name('administration.destroy');
});
