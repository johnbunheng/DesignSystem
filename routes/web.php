<?php

use App\Http\Controllers\DesignController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('designs/report', [DesignController::class, 'report'])->name('designs.report');
    Route::resource('designs', DesignController::class);
});

require __DIR__.'/auth.php';

Route::get('/init-db', function () {
    try {
        Artisan::call('migrate:fresh --seed');
        return "Database Initialized Successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});