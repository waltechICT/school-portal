<?php

use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ArmController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SchoolInfoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\AssessmentManagementController;



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

    Route::get('admin/notices', [NoticeController::class, 'index'])->name('admin.notices.index');
    Route::get('admin/notices/create', [NoticeController::class, 'create'])->name('admin.notices.create');
    Route::post('admin/notices/store', [NoticeController::class, 'store'])->name('admin.notices.store');
    Route::get('admin/notices/{id}', [NoticeController::class, 'show'])->name('admin.notices.show');
    Route::get('admin/notices/{id}/edit', [NoticeController::class, 'edit'])->name('admin.notices.edit');
    Route::put('admin/notices/{id}/update', [NoticeController::class, 'update'])->name('admin.notices.update');
    Route::delete('admin/notices/{id}', [NoticeController::class, 'destroy'])->name('admin.notices.destroy');

    Route::get('admin/portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio.index');
    Route::get('admin/portfolio/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('admin/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('admin/portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::put('admin/portfolio/{id}/update', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('admin/delete-portfolio/{id}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');
    Route::get('admin/portfolio/{id}', [PortfolioController::class, 'show'])->name('admin.portfolio.show');

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

    Route::get('admin/roles',[RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('admin/roles/create',[RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('admin/roles/store',[RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('admin/roles/{id}/edit',[RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::put('admin/roles/{id}/update',[RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('admin/delete-role/{id}',[RoleController::class, 'destroy'])->name('admin.roles.destroy');

    Route::get('admin/school-info',[SchoolInfoController::class, 'index'])->name('admin.school-info.index');
    Route::get('admin/school-info/create',[SchoolInfoController::class, 'create'])->name('admin.school-info.create');
    Route::post('admin/school-info/store',[SchoolInfoController::class, 'store'])->name('admin.school-info.store');
    Route::get('admin/school-info/{id}',[SchoolInfoController::class, 'show'])->name('admin.school-info.show');
    Route::get('admin/school-info/{id}/edit',[SchoolInfoController::class, 'edit'])->name('admin.school-info.edit');
    Route::put('admin/school-info/{id}/update',[SchoolInfoController::class, 'update'])->name('admin.school-info.update');
    Route::delete('admin/delete-school-info/{id}',[SchoolInfoController::class, 'destroy'])->name('admin.school-info.destroy');

    Route::get('admin/assessment',[AssessmentController::class, 'index'])->name('admin.assessment.index');
    Route::get('admin/assessment/create',[AssessmentController::class, 'create'])->name('admin.assessment.create');
    Route::post('admin/assessment/store',[AssessmentController::class, 'store'])->name('admin.assessment.store');
    Route::get('admin/assessment/{id}',[AssessmentController::class, 'show'])->name('admin.assessment.show');
    Route::get('admin/assessment/{id}/edit',[AssessmentController::class, 'edit'])->name('admin.assessment.edit');
    Route::put('admin/assessment/{id}/update',[AssessmentController::class, 'update'])->name('admin.assessment.update');
    Route::delete('admin/delete-assessment/{id}',[AssessmentController::class, 'destroy'])->name('admin.assessment.destroy');

    Route::resource('admin/staff', StaffController::class, ['as' => 'admin']);

    Route::get('/admin/staff-management', [StaffController::class, 'management'])->name('admin.staff.management');

});

