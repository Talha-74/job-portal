<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

// Public routes (Guest only)

Auth::routes();

// Protected routes (Requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    Route::controller(JobController::class)->group(function() {
        Route::get('/job', 'create')->name('job.create');
        Route::post('/store/job', 'store')->name('job.store');
        Route::post('/save-job', 'saveJob')->name('save.job');
        Route::post('/apply/job/', 'ApplyJob')->name('apply.job');
        Route::any('search/result', 'searchResult')->name('search.jobs');

    });

    Route::get('/job-detail/{job}', [JobDetailController::class, 'show'])->name('job.detail');
    Route::get('category/jobs/{name}', [JobDetailController::class, 'singleCategoryJobs'])->name('category.job');

    Route::controller(UserController::class)->group(function() {
        Route::get('/user/profile', 'profile')->name('profile');
        Route::get('/user/applications', 'userApplications')->name('user.applications');
        Route::get('/savedJobs', 'savedJobs')->name('save.jobs');
        Route::get('/edit/profile', 'edit')->name('edit.profile');
        Route::post('/update/profile', 'update')->name('update.profile');
        Route::get('edit/user/cv', 'editCV')->name('edit.cv');
        Route::post('update/user/cv', 'updateCV')->name('update.cv');
    });

    // Admin Dashboard Routes
    Route::controller(AdminController::class)->group(function() {
        Route::get('admin/dashboard', 'index')->name('admin');
        Route::get('show/admin', 'show')->name('show.admin');
        Route::get('create/admin', 'create')->name('create.admin');
        Route::post('store/admin', 'store')->name('store.admin');
        Route::get('show/categories', 'showCategory')->name('show.category');
        Route::get('create/category', 'createCategory')->name('create.category');
        Route::post('store/category', 'storeCategory')->name('store.category');
        Route::delete('delete/category/{category}', 'destroy')->name('delete.category');
        Route::get('edit/category/{category}', 'editCategory')->name('edit.category');
        Route::post('update/category/{category}', 'updateCategory')->name('update.category');


    });

});
