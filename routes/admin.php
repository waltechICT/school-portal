<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SermonController;
use App\Http\Controllers\Admin\GalleryController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/sermons',[SermonController::class, 'index'])->name('admin.sermons.index');
    Route::get('admin/sermons/create',[SermonController::class, 'create'])->name('admin.sermons.create');
    Route::post('admin/sermons/store',[SermonController::class, 'store'])->name('admin.sermons.store');
    Route::get('admin/sermons/{id}',[SermonController::class, 'show'])->name('admin.sermons.show');
    Route::get('admin/sermons/{id}/edit',[SermonController::class, 'edit'])->name('admin.sermons.edit');
    Route::put('admin/sermons/{id}/update',[SermonController::class, 'update'])->name('admin.sermons.update');
    Route::delete('admin/delete-sermon/{id}',[SermonController::class, 'destroy'])->name('admin.sermons.destroy');

    Route::get('admin/galleries',[GalleryController::class, 'index'])->name('admin.galleries.index');
    Route::get('admin/galleries/create',[GalleryController::class, 'create'])->name('admin.galleries.create');
    Route::post('admin/galleries/store',[GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::get('admin/galleries/{id}',[GalleryController::class, 'show'])->name('admin.galleries.show');
    Route::get('admin/galleries/{id}/edit',[GalleryController::class, 'edit'])->name('admin.galleries.edit');
    Route::put('admin/galleries/{id}/update',[GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::delete('admin/delete-gallery/{id}',[GalleryController::class, 'destroy'])->name('admin.galleries.destroy');
});