<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\General\ProgramController;
use App\Http\Controllers\Mitra\MitraProfileController;
use App\Http\Controllers\Mitra\MitraProgramController;
use App\Http\Controllers\User\UserProfileController;
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

Route::get('/btnProfile', [ProgramController::class, 'btnInfoProfile'])->name('btn.profile');

Route::middleware('auth')->group(function(){
    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');
});


Route::prefix('user')->name('user.')->middleware(['role:user', 'auth'])->group(function(){

    // Profile
    Route::get('/profile/{profile}/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{profile}/update', [UserProfileController::class, 'update'])->name('profile.update');


    // Route::resource('program', UserProfileController::class);
});

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
