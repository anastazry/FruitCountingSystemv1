<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MandorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::middleware('can:manage-users')->group(function () {
            Route::get('/create-newuser', [AdminController::class, 'returnRegisterNewUserPage'])->name('admin-users-registration-form');
            Route::post('/register', [AdminController::class, 'registerUser'])->name('admin.register.post');
            Route::get('/user-list', [AdminController::class, 'getAllUserList'])->name('admin.users-list');
            Route::get('/create-qr', [AdminController::class, 'createQR'])->name('admin.create-qr');
            Route::get('/update-assignment/{assignment_id}', [AdminController::class, 'getUpdateAssignmentDetails'])->name('admin.update-assignment');
            Route::put('/update-assignment-insert/{assignment_id}', [AdminController::class, 'updateTaskAssignment'])->name('admin.update-assignment-insert');
            Route::post('/assign-task', [AdminController::class, 'assignTaskToMandor'])->name('admin.assign-task');
        });
        Route::get('/assignment-lists', [AdminController::class, 'getAssignmentList'])->name('admin.assign-list');
        Route::get('/qr-code{assignment_id}', [MandorController::class, 'generateQRCodePage'])->name('admin.create-qrcode');
        Route::get('/missing-assignments1', [MandorController::class, 'missingAssignment1'])->name('admin.missing-assignment-1');
        Route::get('/missing-assignments2', [MandorController::class, 'missingAssignment2'])->name('admin.missing-assignment-2');
        Route::get('/edit-fruit-details/{assignment_id}/{fruit_id}', [MandorController::class, 'editFruitDetails'])->name('editFruitDetails');
    });

    Route::get('/super/dashboard', [DashboardController::class, 'summary'])->name('super-dashboard');
    Route::get('/sales-chart', [DashboardController::class, 'summary'])->name('sales.chart');
    Route::redirect('/create-newuser', '/admin/create-newuser');
    Route::redirect('/user-list', '/admin/user-list');

    Route::prefix('mandor')->group(function () {
        Route::put('/edit-current-fruit-details', [MandorController::class, 'editCurrentFruitDetails'])->name('mandor-edit-current-fruit-details');
        Route::get('/driver-confirm/{assignment_id}', [MandorController::class, 'getDriverPage'])->name('driver-confirmation');
        Route::post('/driver-selection/{selection}/{assignment_id}', [MandorController::class, 'getDriverAnswer'])->name('driver-answer');
    });

    Route::get('/user/update-fruit-details/{assignment_id}', [MandorController::class, 'updateFruitDetails'])->name('mandor-update-fruit-details');
    Route::post('/user/insert-fruit-details', [MandorController::class, 'insertFruitDetails'])->name('mandor-insert-fruit-details');
    Route::get('/user/view-report', [SuperController::class, 'viewReport'])->name('user-view-report');
    Route::get('/users/export', [SuperController::class, 'export'])->name('exportUsers');
});

require __DIR__.'/auth.php';
