<?php

use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ArmController;
use App\Http\Controllers\Admin\StudentController;


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/classes',[SchoolClassController::class, 'index'])->name('admin.classes.index');
    Route::get('admin/classes/create',[SchoolClassController::class, 'create'])->name('admin.classes.create');
    Route::post('admin/classes/store',[SchoolClassController::class, 'store'])->name('admin.classes.store');
    Route::get('admin/classes/{id}',[SchoolClassController::class, 'show'])->name('admin.classes.show');
    Route::get('admin/classes/{id}/edit',[SchoolClassController::class, 'edit'])->name('admin.classes.edit');
    Route::put('admin/classes/{id}/update',[SchoolClassController::class, 'update'])->name('admin.classes.update');
    Route::delete('admin/delete-class/{id}',[SchoolClassController::class, 'destroy'])->name('admin.classes.destroy');

    Route::get('admin/subjects',[SubjectController::class, 'index'])->name('admin.subjects.index');
    Route::get('admin/subjects/create',[SubjectController::class, 'create'])->name('admin.subjects.create');
    Route::post('admin/subjects/store',[SubjectController::class, 'store'])->name('admin.subjects.store');
    Route::get('admin/subjects/{id}',[SubjectController::class, 'show'])->name('admin.subjects.show');
    Route::get('admin/subjects/{id}/edit',[SubjectController::class, 'edit'])->name('admin.subjects.edit');
    Route::put('admin/subjects/{id}/update',[SubjectController::class, 'update'])->name('admin.subjects.update');
    Route::delete('admin/delete-subject/{id}',[SubjectController::class, 'destroy'])->name('admin.subjects.destroy');

    Route::get('admin/arms',[ArmController::class, 'index'])->name('admin.arms.index');
    Route::get('admin/arms/create',[ArmController::class, 'create'])->name('admin.arms.create');
    Route::post('admin/arms/store',[ArmController::class, 'store'])->name('admin.arms.store');
    Route::get('admin/arms/{id}',[ArmController::class, 'show'])->name('admin.arms.show');
    Route::get('admin/arms/{id}/edit',[ArmController::class, 'edit'])->name('admin.arms.edit');
    Route::put('admin/arms/{id}/update',[ArmController::class, 'update'])->name('admin.arms.update');
    Route::delete('admin/delete-arm/{id}',[ArmController::class, 'destroy'])->name('admin.arms.destroy');

    Route::get('admin/students',[StudentController::class, 'index'])->name('admin.students.index');
    Route::get('admin/students/create',[StudentController::class, 'create'])->name('admin.students.create');
    Route::post('admin/students/store',[StudentController::class, 'store'])->name('admin.students.store');
    Route::get('admin/students/{id}',[StudentController::class, 'show'])->name('admin.students.show');
    Route::get('admin/students/{id}/edit',[StudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('admin/students/{id}/update',[StudentController::class, 'update'])->name('admin.students.update');
    Route::delete('admin/delete-student/{id}',[StudentController::class, 'destroy'])->name('admin.students.destroy');
});