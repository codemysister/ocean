<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\General\ProgramController;
use App\Http\Controllers\Mitra\MitraProgramController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/program', ProgramController::class);

Route::prefix('mitra')->name('mitra.')->group(function(){
    Route::resource('program', MitraProgramController::class);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

        Route::resource('category', AdminCategoryController::class);
    });
});
