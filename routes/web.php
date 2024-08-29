<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Public routes (Guest only)

    Auth::routes();

// Protected routes (Requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    Route::get('/job', [JobController::class, 'create'])->name('job.create');
    Route::post('/store/job', [JobController::class, 'store'])->name('job.store');
    Route::get('/job-detail/{job}', [JobDetailController::class, 'show'])->name('job.detail');
    Route::post('/save-job', [JobController::class, 'saveJob'])->name('save.job');
    Route::post('/apply/job/', [JobController::class, 'ApplyJob'])->name('apply.job');

    Route::get('category/jobs/{name}', [JobDetailController::class, 'singleCategoryJobs'])->name('category.job');
    
    Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/user/applications', [UserController::class, 'userApplications'])->name('user.applications');
    Route::get('/savedJobs', [UserController::class, 'savedJobs'])->name('save.jobs');

    Route::get('/edit/profile', [UserController::class, 'edit'])->name('edit.profile');
    Route::post('/update/profile', [UserController::class, 'update'])->name('update.profile');

    Route::get('edit/user/cv', [UserController::class, 'editCV'])->name('edit.cv');
    Route::post('update/user/cv', [UserController::class, 'updateCV'])->name('update.cv');
});


