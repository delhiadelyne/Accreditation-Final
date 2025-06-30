<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::get('/programs', [App\Http\Controllers\PagesController::class, 'getTrades'])->name('getTrades');
Route::get('/program/{id}', [App\Http\Controllers\PagesController::class, 'getTradeDetails'])->name('getTradeDetails');
Route::post('/programs/{id}/apply', [App\Http\Controllers\PagesController::class, 'apply'])->name('programApply');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/training-requests', [App\Http\Controllers\Admin\AdminController::class, 'trainingRequests'])->name('trainingRequests');
    Route::get('/training-program-applications/report', [App\Http\Controllers\Admin\AdminController::class, 'generateReport'])->name('trainingProgramApplicationsReport');
    Route::post('/training-programs/{id}/approve', [App\Http\Controllers\Admin\AdminController::class, 'approveApplication'])->name('approveApplication');
    Route::post('/training-programs/{id}/reject', [App\Http\Controllers\Admin\AdminController::class, 'rejectApplication'])->name('rejectApplication');
    Route::get('/training-request/{id}', [App\Http\Controllers\Admin\AdminController::class, 'trainingRequestDetails'])->name('trainingRequestDetails');
});

Route::middleware(['auth', 'role:admin,institution,company'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/training-programs/create', [App\Http\Controllers\Admin\PagesController::class, 'createTrainingProgram'])->name('createTrainingProgram');
    Route::get('/training-programs', [App\Http\Controllers\Admin\PagesController::class, 'getTrainingPrograms'])->name('getTrainingPrograms');
    Route::get('/report/training-programs', [App\Http\Controllers\Admin\PagesController::class, 'generateTrainingProgramReport'])->name('generateTrainingProgramReport');
    Route::post('/training-programs', [App\Http\Controllers\Admin\PagesController::class, 'storeTrainingProgram'])->name('storeTrainingProgram');
    Route::get('/training-programs/{id}/edit', [App\Http\Controllers\Admin\PagesController::class, 'editTrainingProgram'])->name('editTrainingProgram');
    Route::put('/training-programs/{id}', [App\Http\Controllers\Admin\PagesController::class, 'updateTrainingProgram'])->name('updateTrainingProgram');
    Route::delete('/training-programs/{id}', [App\Http\Controllers\Admin\PagesController::class, 'deleteTrainingProgram'])->name('deleteTrainingProgram');
    Route::post('/training-programs/{id}/send-application', [App\Http\Controllers\Admin\PagesController::class, 'sendApplication'])->name('sendApplication');

    Route::get('/applications', [App\Http\Controllers\Admin\PagesController::class, 'getApplications'])->name('getApplications');
    Route::get('/reports/program-applications', [App\Http\Controllers\Admin\PagesController::class, 'generateProgramApplicationsReport'])->name('generateProgramApplicationsReport');
    Route::post('/update-application-status', [App\Http\Controllers\Admin\PagesController::class, 'updateApplicationStatus'])->name('updateApplicationStatus');

    Route::get('/{id}', [App\Http\Controllers\Admin\PagesController::class, 'getProfile'])->name('getProfile');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\PagesController::class, 'updateInstitutionProfile'])->name('updateInstitutionProfile');

});

Route::middleware(['auth', 'role:institution'])->group(function () {
    //
});

Route::middleware(['auth', 'role:company'])->group(function () {
    //
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/profile/{id}', [App\Http\Controllers\PagesController::class, 'getTraineeProfile'])->name('getTraineeProfile');
    Route::get('/profile/{id}/edit', [App\Http\Controllers\PagesController::class, 'editTraineeProfile'])->name('editTraineeProfile');
    Route::post('/profile/{id}/update', [App\Http\Controllers\PagesController::class, 'updateTraineeProfile'])->name('updateTraineeProfile');
});

