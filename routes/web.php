<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\General\ProgramController;
use App\Http\Controllers\Mitra\MitraProfileController;
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
Route::get('/', function(){
    return view('general.landing');
});

Route::get('/program', [ProgramController::class, 'index'])->name('program')->middleware('auth');
Route::get('/btnProfile', [ProgramController::class, 'btnInfoProfile'])->name('btn.profile');

Route::prefix('mitra')->name('mitra.')->middleware(['role:mitra', 'auth'])->group(function(){

    // Profile
    Route::get('/profile/{profile}/edit', [MitraProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{profile}/update', [MitraProfileController::class, 'update'])->name('profile.update');
    Route::resource('program', MitraProgramController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['role:admin', 'auth'])->group(function(){
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

        Route::resource('category', AdminCategoryController::class);

});
