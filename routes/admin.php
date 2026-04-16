<?php

use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/classes',[SchoolClassController::class, 'index'])->name('admin.classes.index');
    Route::get('admin/classes/create',[SchoolClassController::class, 'create'])->name('admin.classes.create');
    Route::post('admin/classes/store',[SchoolClassController::class, 'store'])->name('admin.classes.store');
    Route::get('admin/classes/{id}',[SchoolClassController::class, 'show'])->name('admin.classes.show');
    Route::get('admin/classes/{id}/edit',[SchoolClassController::class, 'edit'])->name('admin.classes.edit');
    Route::put('admin/classes/{id}/update',[SchoolClassController::class, 'update'])->name('admin.classes.update');
    Route::delete('admin/delete-class/{id}',[SchoolClassController::class, 'destroy'])->name('admin.classes.destroy');

    Route::resource('admin/staff', StaffController::class, ['as' => 'admin']);

    Route::get('/admin/staff-management', [StaffController::class, 'management'])->name('admin.staff.management');

});
