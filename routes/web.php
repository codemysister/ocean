<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMitraController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\General\LandingController;
use App\Http\Controllers\General\ProgramController;
use App\Http\Controllers\Mitra\MitraApplicantController;
use App\Http\Controllers\Mitra\MitraProfileController;
use App\Http\Controllers\Mitra\MitraProgramController;
use App\Http\Controllers\User\UserApplicantController;
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
Route::get('/', LandingController::class);

Route::get('/btnProfile', [ProgramController::class, 'btnInfoProfile'])->name('btn.profile');

Route::middleware('auth')->group(function(){
    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');
});


Route::prefix('user')->name('user.')->middleware(['role:user', 'auth'])->group(function(){

    // Profile
    Route::get('/profile/{profile}/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{profile}/update', [UserProfileController::class, 'update'])->name('profile.update');

    // Applicant
    Route::post('/apply', [UserApplicantController::class, 'apply'])->name('apply');
    Route::get('/lamaran', [UserApplicantController::class, 'index'])->name('applicant.index');
    Route::get('/lamaran/{program}/deskripsi', [UserApplicantController::class, 'show'])->name('applicant.show');
    Route::get('/lamaran/{program}/status', [UserApplicantController::class, 'status'])->name('applicant.status');
    Route::post('/lamaran/{program}/submission/{applicant}/submit', [UserApplicantController::class, 'submitSubmission'])->name('applicant.submit');
    Route::patch('/lamaran/{program}/interview/{applicant}/konfirmasi', [UserApplicantController::class, 'confirmationInterview'])->name('applicant.confirmation');

    // Route::resource('program', UserProfileController::class);
});

Route::prefix('mitra')->name('mitra.')->middleware(['role:mitra', 'auth'])->group(function(){

    // Profile
    Route::get('/profile/{profile}/edit', [MitraProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{profile}/update', [MitraProfileController::class, 'update'])->name('profile.update');

    // Program
    Route::get('/program', [MitraProgramController::class, 'index'])->name('program.index');
    Route::get('/program/create', [MitraProgramController::class, 'create'])->name('program.create');
    Route::post('/program', [MitraProgramController::class, 'store'])->name('program.store');
    Route::get('/program/{program}/edit', [MitraProgramController::class, 'edit'])->name('program.edit');
    Route::patch('/program/{program}/update', [MitraProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/{program}/destroy', [MitraProgramController::class, 'destroy'])->name('program.destroy');
    Route::get('/program/{program}/deskripsi', [MitraProgramController::class, 'show'])->name('program.show');

    Route::get('/program/{program}/pendaftar', [MitraApplicantController::class, 'applicant'])->name('program.applicant');
    Route::get('/program/{program}/seleksi', [MitraApplicantController::class, 'selection'])->name('program.applicant.selection');
    Route::get('/program/{program}/interview', [MitraApplicantController::class, 'interview'])->name('program.applicant.interview');
    Route::get('/program/{program}/lolos', [MitraApplicantController::class, 'pass'])->name('program.applicant.pass');
    Route::post('/program/{program}/interview', [MitraApplicantController::class, 'invite'])->name('program.applicant.invite');

    Route::patch('/program/{program}/pendaftar/{applicant}/interview', [MitraApplicantController::class, 'setInterview'])->name('program.applicant.set_interview');
    Route::patch('/program/{program}/pendaftar/{applicant}/seleksi', [MitraApplicantController::class, 'select'])->name('program.applicant.select');
    Route::patch('/program/{program}/pendaftar/{applicant}/tolak', [MitraApplicantController::class, 'reject'])->name('program.applicant.reject');
    Route::patch('/program/{program}/pendaftar/{applicant}/lolos', [MitraApplicantController::class, 'passApplicant'])->name('program.applicant.pass_applicant');

    Route::post('/program/{program}/submission', [MitraApplicantController::class, 'submission'])->name('program.applicant.submission');
    Route::patch('/program/{program}/submission/{submission}', [MitraApplicantController::class, 'updateSubmission'])->name('program.applicant.submission.update');
    Route::delete('/program/{program}/submission/{submission}/destroy', [MitraApplicantController::class, 'deleteSubmission'])->name('program.applicant.submission.destroy');

    Route::post('/program/{program}/informasi', [MitraApplicantController::class, 'submitInformation'])->name('program.applicant.submit.information');
    Route::patch('/program/{program}/informasi/{information}', [MitraApplicantController::class, 'updateInformation'])->name('program.applicant.update.information');

});

Route::prefix('admin')->name('admin.')->middleware(['role:admin', 'auth'])->group(function(){
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

        // Kategori
        Route::resource('category', AdminCategoryController::class);

        // Slider
        Route::resource('slider', AdminSliderController::class);

        // Mitra
        Route::get('/mitra', [AdminMitraController::class, 'index'])->name('mitra.index');
        Route::delete('/mitra/{mitra}/destroy', [AdminMitraController::class, 'destroy'])->name('mitra.destroy');

        // User
        Route::get('/user', [AdminUserController::class, 'index'])->name('user.index');
        Route::delete('/user/{user}/destroy', [AdminUserController::class, 'destroy'])->name('user.destroy');

});
